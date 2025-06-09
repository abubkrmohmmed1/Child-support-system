<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'evaluator_name',
        'birth_date',
        'gender',
        'address',
        'phone',
        'class',
        'father_job',
        'father_education',
        'father_age',
        'mother_job',
        'mother_education',
        'mother_age',
        'info_provider',
        'relation_to_child',
        'living_with',
        'economic_status',
        'siblings_count',
        'child_order',
        'is_spoiled',
        'other_language',
        'child_understands_other_language',
        'problem_date',
        'main_complaint',
        'problem_history',
        'problem_progress',
        'family_similar_problems',
        'speech_language_issues',
        'speech_language_issues_desc',
        'hearing_issues',
        'hearing_issues_desc',
        'attention_issues',
        'attention_issues_desc',
        'cognitive_issues',
        'cognitive_issues_desc',
        'iq_test',
        'previous_evaluations',
        'evaluation_details',
        'treatments',
        'treatments_details',
        'home_problems',
        'school_problems',
        'birth_abnormalities',
        'mother_age_at_birth',
        'pregnancy_duration',
        'mother_pregnancy_issues',
        'hospital_stay',
        'medical_issues',
        'doctor_visits',
        'medications',
        'developmental_milestones',
        'choking',
        'puts_things_in_mouth',
        'teeth_brushing',
        'repeats_words',
        'understands_speech',
        'points_to_objects',
        'follows_simple_instructions',
        'answers_yes_no',
        'answers_wh_questions',
        'social_communication',
        'incorrect_pronunciation',
        'current_communication',
        'behavioral_features',
        'school_name',
        'failed_year',
        'favorite_subjects',
        'subject_difficulties',
        'received_help',
        'additional_notes',
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
