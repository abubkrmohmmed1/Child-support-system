<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChildrenTable extends Migration
{
    public function up(): void
    {
        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();

            $table->string('father_job')->nullable();
            $table->string('father_education')->nullable();
            $table->integer('father_age')->nullable();
            $table->string('mother_job')->nullable();
            $table->string('mother_education')->nullable();
            $table->integer('mother_age')->nullable();

            $table->string('info_provider_name')->nullable();
            $table->string('info_provider_relation')->nullable();
            $table->string('lives_with')->nullable();
            $table->string('economic_status')->nullable();
            $table->integer('siblings_count')->nullable();
            $table->integer('child_order')->nullable();
            $table->boolean('is_spoiled')->nullable();

            $table->string('other_languages')->nullable();
            $table->boolean('understands_other_languages')->nullable();

            $table->text('main_complaint')->nullable();
            $table->string('complaint_start_date')->nullable();
            $table->text('family_handling_description')->nullable();
            $table->text('complaint_progress')->nullable();
            $table->text('similar_cases_in_family')->nullable();

            $table->text('speech_problem_description')->nullable();
            $table->text('hearing_problem_description')->nullable();
            $table->text('attention_problem_description')->nullable();
            $table->text('cognitive_problem_description')->nullable();

            $table->boolean('had_iq_test')->nullable();
            $table->boolean('was_evaluated_before')->nullable();
            $table->string('evaluation_place_date')->nullable();
            $table->text('evaluation_result')->nullable();
            $table->text('previous_treatments')->nullable();

            $table->text('home_problems')->nullable();
            $table->text('school_problems')->nullable();

            $table->text('birth_description')->nullable();
            $table->integer('mother_age_at_birth')->nullable();
            $table->string('pregnancy_duration')->nullable();
            $table->text('pregnancy_issues')->nullable();
            $table->text('hospital_stay_description')->nullable();

            $table->boolean('has_hearing_issues')->nullable();
            $table->boolean('has_sleep_issues')->nullable();
            $table->boolean('has_head_injuries')->nullable();
            $table->boolean('has_chewing_issues')->nullable();
            $table->boolean('has_vision_issues')->nullable();
            $table->boolean('has_perception_issues')->nullable();
            $table->boolean('has_brain_issues')->nullable();
            $table->boolean('has_sinus_issues')->nullable();
            $table->boolean('has_breathing_issues')->nullable();
            $table->boolean('has_motor_issues')->nullable();
            $table->boolean('has_tonsils_issues')->nullable();
            $table->boolean('has_ear_issues')->nullable();
            $table->boolean('has_swallowing_issues')->nullable();
            $table->text('other_medical_issues')->nullable();
            $table->text('doctor_consultation_description')->nullable();
            $table->text('medical_prescriptions')->nullable();

            $table->string('sitting_age')->nullable();
            $table->string('walking_age')->nullable();
            $table->string('first_words_age')->nullable();
            $table->string('babbling_age')->nullable();
            $table->string('simple_sentences_age')->nullable();
            $table->string('object_recognition_age')->nullable();
            $table->string('toilet_training_age')->nullable();

            $table->boolean('choking_on_food')->nullable();
            $table->boolean('putting_objects_in_mouth')->nullable();
            $table->boolean('brushing_teeth')->nullable();
            $table->boolean('repeats_words')->nullable();
            $table->boolean('understands_language')->nullable();
            $table->boolean('points_to_objects')->nullable();
            $table->boolean('follows_simple_instructions')->nullable();
            $table->boolean('answers_yes_no')->nullable();
            $table->boolean('answers_wh_questions')->nullable();
            $table->boolean('social_interaction')->nullable();
            $table->boolean('speech_clarity')->nullable();

            $table->text('current_communication')->nullable();
            $table->text('behavioral_symptoms')->nullable();

            $table->string('school_name')->nullable();
            $table->string('school_grade')->nullable();
            $table->boolean('has_repeated_grade')->nullable();
            $table->text('favorite_subjects')->nullable();
            $table->text('has_difficult_subjects')->nullable();
            $table->text('received_help_in_subjects')->nullable();

            $table->text('additional_notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('children');
    }
}
