<?php

namespace App\Http\Controllers;

use App\Models\Child;
use App\Models\DailyReport;
use Illuminate\Http\Request;

class DailyReportController extends Controller
{
    public function index(Request $request)
    {
        $children = Child::all(); // Fetch all children

        $reports = DailyReport::query();

        if ($request->has('child_id') && $request->child_id != '') {
            $reports->where('child_id', $request->child_id);
        }

        $reports = $reports->paginate(10);

        return view('daily_reports.index', compact('reports', 'children'));
    }

    public function create()
    {
        $children = Child::all();
        return view('daily_reports.create', compact('children'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'report_date' => 'required|date',
            'day' => 'required|string',
        ]);

        DailyReport::create($request->all());

        return redirect()->route('daily-reports.index')->with('success', 'تم حفظ التقرير بنجاح.');
    }

    public function show(DailyReport $dailyReport)
    {
        return view('daily_reports.show', ['report' => $dailyReport]);
    }

    public function edit(DailyReport $dailyReport)
    {
        $children = Child::all();
        return view('daily_reports.edit', compact('dailyReport', 'children'));
    }

    public function update(Request $request, DailyReport $dailyReport)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'report_date' => 'required|date',
            'day' => 'required|string',
        ]);

        $dailyReport->update($request->all());

        return redirect()->route('daily-reports.index')->with('success', 'تم التحديث بنجاح.');
    }

    public function destroy(DailyReport $dailyReport)
    {
        $dailyReport->delete();
        return back()->with('success', 'تم حذف التقرير.');
    }
}
