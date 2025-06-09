<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Report;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $children = Child::all();
        $query = Report::query();

        if ($request->has('child_id') && $request->child_id != '') {
            $query->where('child_id', $request->child_id);
        }

        if ($request->has('report_type') && $request->report_type != '') {
            $query->where('report_type', $request->report_type);
        }

        $reports = $query->paginate(10);

        return view('reports.index', compact('reports', 'children'));
    }

    /**
     * Show the form for creating a new report.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $children = Child::all();
        return view('reports.create', compact('children'));
    }

    /**
     * Store a newly created report in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'child_id' => 'required|exists:children,id',
            'report_type' => 'required|string',
            'report_date' => 'required|date',
            'health_status' => 'nullable|string',
            'education_status' => 'nullable|string',
            'psychological_status' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        Report::create($request->all());

        return redirect()->route('reports.index')->with('success', 'تم إضافة التقرير بنجاح.');
    }

    /**
     * Display the specified report.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $report = Report::findOrFail($id);
        return view('daily_reports.show', compact('report'));
    }
}
