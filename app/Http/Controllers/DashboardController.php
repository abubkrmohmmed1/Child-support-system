<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Report;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'childrenCount' => \App\Models\Child::count(),
            'reportsCount' => \App\Models\Report::count(),
            'caseEvaluationsCount' => \App\Models\CaseEvaluation::count(),
            'dailyReportsCount' => \App\Models\DailyReport::count(),
            // Add more as needed
        ]);
    }
}
