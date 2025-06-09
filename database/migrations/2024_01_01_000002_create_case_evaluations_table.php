<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('case_evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->constrained()->onDelete('cascade');
            $table->string('evaluator_name');
            $table->date('birth_date')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('class')->nullable();
            $table->string('father_job')->nullable();
            $table->string('father_education')->nullable();
            $table->integer('father_age')->nullable();
            $table->string('mother_job')->nullable();
            $table->string('mother_education')->nullable();
            $table->integer('mother_age')->nullable();
            $table->string('info_provider')->nullable();
            $table->string('relation_to_child')->nullable();
            $table->string('living_with')->nullable();
            $table->string('economic_status')->nullable();
            $table->integer('siblings_count')->nullable();
            $table->integer('child_order')->nullable();
            $table->boolean('is_spoiled')->nullable();
            $table->string('other_language')->nullable();
            $table->boolean('child_understands_other_language')->nullable();
            $table->date('problem_date')->nullable();
            $table->text('main_complaint')->nullable();
            $table->text('problem_history')->nullable();
            $table->string('problem_progress')->nullable();
            $table->text('family_similar_problems')->nullable();
            $table->boolean('speech_language_issues')->nullable();
            $table->text('speech_language_issues_desc')->nullable();
            $table->boolean('hearing_issues')->nullable();
            $table->text('hearing_issues_desc')->nullable();
            $table->boolean('attention_issues')->nullable();
            $table->text('attention_issues_desc')->nullable();
            $table->boolean('cognitive_issues')->nullable();
            $table->text('cognitive_issues_desc')->nullable();
            $table->string('iq_test')->nullable();
            $table->string('previous_evaluations')->nullable();
            $table->text('evaluation_details')->nullable();
            $table->string('treatments')->nullable();
            $table->text('treatments_details')->nullable();
            $table->text('home_problems')->nullable();
            $table->text('school_problems')->nullable();
            $table->text('birth_abnormalities')->nullable();
            $table->integer('mother_age_at_birth')->nullable();
            $table->string('pregnancy_duration')->nullable();
            $table->text('mother_pregnancy_issues')->nullable();
            $table->text('hospital_stay')->nullable();
            $table->text('medical_issues')->nullable();
            $table->text('doctor_visits')->nullable();
            $table->text('medications')->nullable();
            $table->text('developmental_milestones')->nullable();
            $table->boolean('choking')->nullable();
            $table->boolean('puts_things_in_mouth')->nullable();
            $table->boolean('teeth_brushing')->nullable();
            $table->boolean('repeats_words')->nullable();
            $table->boolean('understands_speech')->nullable();
            $table->boolean('points_to_objects')->nullable();
            $table->boolean('follows_simple_instructions')->nullable();
            $table->boolean('answers_yes_no')->nullable();
            $table->boolean('answers_wh_questions')->nullable();
            $table->boolean('social_communication')->nullable();
            $table->boolean('incorrect_pronunciation')->nullable();
            $table->string('current_communication')->nullable();
            $table->text('behavioral_features')->nullable();
            $table->string('school_name')->nullable();
            $table->boolean('failed_year')->nullable();
            $table->string('favorite_subjects')->nullable();
            $table->boolean('subject_difficulties')->nullable();
            $table->boolean('received_help')->nullable();
            $table->text('additional_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('case_evaluations');
    }
};
