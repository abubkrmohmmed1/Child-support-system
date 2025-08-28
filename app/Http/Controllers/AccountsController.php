<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountsController extends Controller
{
    private function authorizeAccountant()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, ['admin', 'accountant'])) {
            abort(403, 'Unauthorized');
        }
    }

    public function dashboard()
    {
        $this->authorizeAccountant();
        return view('accounts.dashboard');
    }

    public function revenues()
    {
        $this->authorizeAccountant();
        $children = \App\Models\Child::all();
        $categories = \App\Models\Category::all(); // Fetch all categories
        $revenues = \App\Models\Revenue::with('child')->get();
        return view('accounts.revenues', compact('children', 'categories', 'revenues'));
    }

    public function expenses()
    {
        $this->authorizeAccountant();
        // Logic for expenses
        return view('accounts.expenses');
    }

    public function categories()
    {
        $this->authorizeAccountant();
        $categories = \App\Models\Category::all(); // Fetch all categories
        return view('accounts.categories', compact('categories'));
    }

    public function storeCategory(Request $request)
    {
        $this->authorizeAccountant();
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        \App\Models\Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('accounts.categories')->with('success', 'تمت إضافة الفئة بنجاح');
    }

    public function destroyCategory($id)
    {
        $this->authorizeAccountant();
        $category = \App\Models\Category::findOrFail($id);
        $category->delete();
        return redirect()->route('accounts.categories')->with('success', 'تم حذف الفئة بنجاح');
    }

    public function storeRevenue(Request $request)
    {
        $this->authorizeAccountant();
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'category_id' => 'required|exists:categories,id',
            'payment_method' => 'required|string',
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            // Optional fields:
            'bank_name' => 'nullable|string|max:255',
            'bank_account' => 'nullable|string|max:255',
            'installment_count' => 'nullable|integer|min:1',
            'installment_value' => 'nullable|numeric|min:1',
        ]);
        \App\Models\Revenue::create($request->only([
            'child_id',
            'category_id',
            'payment_method',
            'bank_name',
            'bank_account',
            'installment_count',
            'installment_value',
            'description',
            'amount',
            'date',
        ]));
        return redirect()->route('accounts.revenues')->with('success', 'تمت إضافة الإيراد بنجاح');
    }

    public function storeExpense(Request $request)
    {
        $this->authorizeAccountant();
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id',
        ]);
        \App\Models\Expense::create($request->only('description', 'amount', 'date', 'category_id'));
        return redirect()->route('accounts.expenses')->with('success', 'تمت إضافة المصروف بنجاح');
    }

    public function destroyRevenue($id)
    {
        $this->authorizeAccountant();
        $revenue = \App\Models\Revenue::findOrFail($id);
        $revenue->delete();
        return redirect()->route('accounts.revenues')->with('success', 'تم حذف الإيراد بنجاح');
    }

    public function trashedRevenues()
    {
        $this->authorizeAccountant();
        $revenues = \App\Models\Revenue::onlyTrashed()->with('child')->get();
        return view('accounts.revenues_trash', compact('revenues'));
    }

    public function accounts()
    {
        $this->authorizeAccountant();
        // Fetch accounts if needed, e.g. $accounts = \App\Models\Account::all();
        return view('accounts.accounts'); // , compact('accounts') if you have accounts data
    }

    ## 6. **accounts.storeAccount in Controller**
    
    public function storeAccount(Request $request)
    {
        $this->authorizeAccountant();
        $request->validate([
            'account_name' => 'required|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'method' => 'required|string|max:255',
            'balance' => 'nullable|numeric',
        ]);
        \App\Models\Account::create($request->only('account_name', 'account_number', 'method', 'balance'));
        return redirect()->route('accounts.accounts')->with('success', 'تمت إضافة الحساب بنجاح');
    }

    public function reports(Request $request)
    {
        $this->authorizeAccountant();
        $categories = \App\Models\Category::all();

        $query = \App\Models\Revenue::query()->with('category');

        if ($request->filled('from_date')) {
            $query->where('date', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->where('date', '<=', $request->to_date);
        }
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        if ($request->filled('payment_method')) {
            $query->where('payment_method', $request->payment_method);
        }

        $results = $query->get();

        // Export logic
        if ($request->get('export') === 'pdf') {
            $pdf = \PDF::loadView('accounts.reports_pdf', compact('results'));
            return $pdf->download('financial_report.pdf');
        }
        if ($request->get('export') === 'excel') {
            return \Excel::download(new \App\Exports\FinancialReportExport($results), 'financial_report.xlsx');
        }

        return view('accounts.reports', compact('categories', 'results'));
    }

    public function closing(Request $request)
    {
        $this->authorizeAccountant();
        $periods = \App\Models\FinancialPeriod::orderBy('start_date', 'desc')->get();
        $currentPeriod = $periods->firstWhere('status', 'open');
        $accounts = \App\Models\Account::all();
    
        // Calculate balances for current period
        $balances = [];
        foreach ($accounts as $account) {
            $revenues = $account->revenues()->where('financial_period_id', $currentPeriod?->id)->sum('amount');
            $expenses = $account->expenses()->where('financial_period_id', $currentPeriod?->id)->sum('amount');
            $balances[$account->id] = $revenues - $expenses;
        }
    
        return view('accounts.closing', compact('periods', 'currentPeriod', 'accounts', 'balances'));
    }

    public function closePeriod(Request $request)
    {
        $this->authorizeAccountant();
        $period = \App\Models\FinancialPeriod::where('status', 'open')->firstOrFail();
        $period->status = 'closed';
        $period->save();
    
        // Create new period (example: next month)
        $newPeriod = \App\Models\FinancialPeriod::create([
            'name' => 'New Period',
            'start_date' => $period->end_date->addDay(),
            'end_date' => $period->end_date->addMonth(),
            'status' => 'open',
        ]);
    
        // Optionally: Copy balances as opening entries
    
        return redirect()->route('accounts.closing')->with('success', 'تم إغلاق الفترة المالية وفتح فترة جديدة.');
    }

    public function filters(Request $request)
    {
        $this->authorizeAccountant();
        $accounts = \App\Models\Account::all();
    
        $results = collect();

        if ($request->type == 'revenue' || !$request->type) {
            $revenues = \App\Models\Revenue::with('account')
                ->when($request->from_date, fn($q) => $q->where('date', '>=', $request->from_date))
                ->when($request->to_date, fn($q) => $q->where('date', '<=', $request->to_date))
                ->when($request->account_id, fn($q) => $q->where('account_id', $request->account_id))
                ->get()
                ->map(fn($r) => (object)[
                    'date' => $r->date,
                    'description' => $r->description,
                    'type' => 'إيراد',
                    'account' => $r->account,
                    'amount' => $r->amount,
                ]);
            $results = $results->concat($revenues);
        }
        if ($request->type == 'expense' || !$request->type) {
            $expenses = \App\Models\Expense::with('account')
                ->when($request->from_date, fn($q) => $q->where('date', '>=', $request->from_date))
                ->when($request->to_date, fn($q) => $q->where('date', '<=', $request->to_date))
                ->when($request->account_id, fn($q) => $q->where('account_id', $request->account_id))
                ->get()
                ->map(fn($e) => (object)[
                    'date' => $e->date,
                    'description' => $e->description,
                    'type' => 'مصروف',
                    'account' => $e->account,
                    'amount' => $e->amount,
                ]);
            $results = $results->concat($expenses);
        }

        $results = $results->sortBy('date');

        return view('accounts.filters', compact('accounts', 'results'));
    }

    public function budget(Request $request)
    {
        $this->authorizeAccountant();
    
        // Get the current open financial period
        $period = \App\Models\FinancialPeriod::where('status', 'open')->first();
        if (!$period) {
            $data = collect();
            return view('accounts.budget', compact('data'));
        }
    
        // Get all budgets for the period
        $budgets = \App\Models\Budget::with('category')
            ->where('financial_period_id', $period->id)
            ->get();
    
        // Build the data array for the view
        $data = $budgets->map(function($budget) use ($period) {
            $actual = \App\Models\Expense::where('category_id', $budget->category_id)
                ->where('financial_period_id', $period->id)
                ->sum('amount');
            $diff = $budget->expected_amount - $actual;
            $percent = $budget->expected_amount ? ($actual / $budget->expected_amount) * 100 : 0;
            return (object)[
                'category' => $budget->category->name,
                'expected' => $budget->expected_amount,
                'actual' => $actual,
                'diff' => $diff,
                'percent' => $percent,
            ];
        });
    
        return view('accounts.budget', compact('data'));
    }

    ## 5. Debts and Collection (المديونيات والتحصيل)
    
    ### Controller
    public function debts(Request $request)
    {
        $this->authorizeAccountant();
        $students = \App\Models\Child::all();
        $debts = $students->map(function($student) {
            $total_fees = $student->fees()->sum('amount');
            $paid = $student->revenues()->sum('amount');
            $remaining = $total_fees - $paid;
            $last_payment = $student->revenues()->latest('date')->first()?->date;
            return (object)[
                'name' => $student->name,
                'total_fees' => $total_fees,
                'paid' => $paid,
                'remaining' => $remaining,
                'last_payment' => $last_payment,
            ];
        });
        return view('accounts.debts', compact('debts'));
    }

    public function settings()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('accounts.settings');
    }
}