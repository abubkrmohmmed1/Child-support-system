<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CaseEvaluation;
use App\Models\Child;

class CaseEvaluationController extends Controller
{
    public function index(Request $request)
    {
        $children = Child::all(); // Fetch all children

        $query = CaseEvaluation::query();

        if ($request->has('child_id') && $request->child_id != '') {
            $query->where('child_id', $request->child_id);
        }

        $evaluations = $query->paginate(10); // Fetch evaluations with pagination

        return view('case_evaluations.index', compact('evaluations', 'children'));
    }

    public function create()
    {
        $children = Child::all();
        $users = \App\Models\User::all();
        return view('case_evaluations.create', compact('children', 'users'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'child_id' => 'required|exists:children,id',
            'evaluator_name' => 'required|string',
            'birth_date' => 'nullable|date',
            'gender' => 'nullable|string',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'class' => 'nullable|string',
            'father_job' => 'nullable|string',
            'father_education' => 'nullable|string',
            'father_age' => 'nullable|integer',
            'mother_job' => 'nullable|string',
            'mother_education' => 'nullable|string',
            'mother_age' => 'nullable|integer',
            'info_provider' => 'nullable|string',
            'relation_to_child' => 'nullable|string',
            'living_with' => 'nullable|string',
            'economic_status' => 'nullable|string',
            'siblings_count' => 'nullable|integer',
            'child_order' => 'nullable|integer',
            'is_spoiled' => 'nullable|boolean',
            'other_language' => 'nullable|string',
            'child_understands_other_language' => 'nullable|boolean',
            'problem_date' => 'nullable|date',
            'main_complaint' => 'nullable|string',
            'problem_history' => 'nullable|string',
            'problem_progress' => 'nullable|string',
            'family_similar_problems' => 'nullable|string',
            'speech_language_issues' => 'nullable|boolean',
            'speech_language_issues_desc' => 'nullable|string',
            'hearing_issues' => 'nullable|boolean',
            'hearing_issues_desc' => 'nullable|string',
            'attention_issues' => 'nullable|boolean',
            'attention_issues_desc' => 'nullable|string',
            'cognitive_issues' => 'nullable|boolean',
            'cognitive_issues_desc' => 'nullable|string',
            'iq_test' => 'nullable|string',
            'previous_evaluations' => 'nullable|string',
            'evaluation_details' => 'nullable|string',
            'treatments' => 'nullable|string',
            'treatments_details' => 'nullable|string',
            'home_problems' => 'nullable|string',
            'school_problems' => 'nullable|string',
            'birth_abnormalities' => 'nullable|string',
            'mother_age_at_birth' => 'nullable|integer',
            'pregnancy_duration' => 'nullable|string',
            'mother_pregnancy_issues' => 'nullable|string',
            'hospital_stay' => 'nullable|string',
            'medical_issues' => 'nullable|string',
            'doctor_visits' => 'nullable|string',
            'medications' => 'nullable|string',
            'developmental_milestones' => 'nullable|string',
            'choking' => 'nullable|boolean',
            'puts_things_in_mouth' => 'nullable|boolean',
            'teeth_brushing' => 'nullable|boolean',
            'repeats_words' => 'nullable|boolean',
            'understands_speech' => 'nullable|boolean',
            'points_to_objects' => 'nullable|boolean',
            'follows_simple_instructions' => 'nullable|boolean',
            'answers_yes_no' => 'nullable|boolean',
            'answers_wh_questions' => 'nullable|boolean',
            'social_communication' => 'nullable|boolean',
            'incorrect_pronunciation' => 'nullable|boolean',
            'current_communication' => 'nullable|string',
            'behavioral_features' => 'nullable|string',
            'school_name' => 'nullable|string',
            'failed_year' => 'nullable|boolean',
            'favorite_subjects' => 'nullable|string',
            'subject_difficulties' => 'nullable|boolean',
            'received_help' => 'nullable|boolean',
            'additional_notes' => 'nullable|string',
            // Add validation rules for other fields
        ]);

        // Debugging: Log the validated data
        \Log::info('Validated Data:', $validatedData);

        // Create a new case evaluation record
        $evaluation = CaseEvaluation::create($validatedData);

        // Redirect or return a response
        if ($evaluation) {
            return redirect()->route('case-evaluations.index')->with('success', 'تمت إضافة دراسة الحالة بنجاح.');
        } else {
            return redirect()->back()->withInput()->with('error', 'حدث خطأ أثناء حفظ دراسة الحالة. يرجى المحاولة مرة أخرى.');
        }
    }

    public function show($id) {
         $evaluation = CaseEvaluation::findOrFail($id); 
         return view('case_evaluations.show', compact('evaluation'));
        }
    public function edit($id)
    {
        $evaluation = \App\Models\CaseEvaluation::findOrFail($id);
        $children = \App\Models\Child::all();
        $users = \App\Models\User::all(); // Fetch all users
    
        return view('case_evaluations.edit', compact('evaluation', 'children', 'users'));
    }
    public function update(Request $request, $id) { 
        $evaluation = CaseEvaluation::findOrFail($id); 
        $evaluation->update($request->all()); 
        return redirect()->route('case-evaluations.index')->with('success', 'تم التحديث بنجاح'); 
    } 


}
