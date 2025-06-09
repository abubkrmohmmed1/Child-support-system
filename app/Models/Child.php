<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'birth_date',
        'gender',
        'address',
        'phone',
        'father_job',
        'father_education',
        'father_age',
        'mother_job',
        'mother_education',
        'mother_age',
        'info_provider_name',
        'info_provider_relation',
        'lives_with',
        'economic_status',
        'siblings_count',
        'child_order',
        'is_spoiled',
        'other_languages',
        'understands_other_languages',
        'main_complaint',
        'complaint_start_date',
        'family_handling_description',
        'complaint_progress',
        'similar_cases_in_family',
        'speech_problem_description',
        'hearing_problem_description',
        'attention_problem_description',
        'cognitive_problem_description',
        'had_iq_test',
        'was_evaluated_before',
        'evaluation_place_date',
        'evaluation_result',
        'previous_treatments',
        'home_problems',
        'school_problems',
        'birth_description',
        'mother_age_at_birth',
        'pregnancy_duration',
        'pregnancy_issues',
        'hospital_stay_description',
        'has_hearing_issues',
        'has_sleep_issues',
        'has_head_injuries',
        'has_chewing_issues',
        'has_vision_issues',
        'has_perception_issues',
        'has_brain_issues',
        'has_sinus_issues',
        'has_breathing_issues',
        'has_motor_issues',
        'has_tonsils_issues',
        'has_ear_issues',
        'has_swallowing_issues',
        'other_medical_issues',
        'doctor_consultation_description',
        'medical_prescriptions',
        'sitting_age',
        'walking_age',
        'first_words_age',
        'babbling_age',
        'simple_sentences_age',
        'object_recognition_age',
        'toilet_training_age',
        'choking_on_food',
        'putting_objects_in_mouth',
        'brushing_teeth',
        'repeats_words',
        'understands_language',
        'points_to_objects',
        'follows_simple_instructions',
        'answers_yes_no',
        'answers_wh_questions',
        'social_interaction',
        'speech_clarity',
        'current_communication',
        'behavioral_symptoms',
        'school_name',
        'school_grade',
        'has_repeated_grade',
        'favorite_subjects',
        'has_difficult_subjects',
        'received_help_in_subjects',
        'additional_notes',
    ];

    public function dailyReports()
    {
        return $this->hasMany(DailyReport::class);
    }
    public function caseEvaluation()
{
    return $this->hasOne(CaseEvaluation::class);
}
public function reports()
{
    return $this->hasMany(Report::class);
}

public function fees()
{
    return $this->hasMany(\App\Models\Fee::class, 'child_id');
}

// Add this method:
public function revenues()
{
    return $this->hasMany(\App\Models\Revenue::class, 'child_id');
}
}


