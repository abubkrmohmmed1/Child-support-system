<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserActionLog;

class AdminController extends Controller
{
    public function userActivity()
    {
        if (!auth()->user() || (auth()->user()->role ?? null) !== 'admin') {
            abort(403, 'Unauthorized');
        }

        // Fetch users with counts for related models
        $users = User::withCount(['caseEvaluations', 'reports', 'dailyReports'])->get();

        // Log the actions for the current session
        UserActionLog::create([
            'user_id' => auth()->id(),
            'children_count' => \App\Models\Child::count(),
            'reports_count' => \App\Models\Report::count(),
            'case_evaluations_count' => \App\Models\CaseEvaluation::count(),
            'daily_reports_count' => \App\Models\DailyReport::count(),
        ]);

        return view('admin.user_activity', compact('users'), [
            'childrenCount' => \App\Models\Child::count(),
            'reportsCount' => \App\Models\Report::count(),
            'caseEvaluationsCount' => \App\Models\CaseEvaluation::count(),
            'dailyReportsCount' => \App\Models\DailyReport::count(),
        ]);
    }
    
    public function showChangePasswordForm()
    {
        if (!auth()->user() || (auth()->user()->role ?? null) !== 'admin') {
            abort(403, 'Unauthorized');
        }
        return view('admin.change_password');
    }

    public function changePassword(Request $request)
    {
        if (!auth()->user() || (auth()->user()->role ?? null) !== 'admin') {
            abort(403, 'Unauthorized');
        }
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);
        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->back()->with('success', 'تم تغيير كلمة المرور بنجاح');
    }
}