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
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('child_id')->constrained()->onDelete('cascade');
        
            $table->date('report_date');
            $table->string('day');
            $table->time('check_in')->nullable();
            $table->time('check_out')->nullable();
        
            $table->boolean('had_issue')->default(false);
            $table->text('issue_description')->nullable();
            $table->text('issue_resolution')->nullable();
        
            $table->integer('sessions_count')->default(0);
            $table->integer('attendees_count')->default(0);
            $table->integer('absentees_count')->default(0);
        
            $table->boolean('has_case_study')->default(false);
            $table->integer('case_studies_count')->default(0);
            $table->integer('class_absentees_count')->default(0);
        
            $table->string('parent_psych_status')->nullable();
            $table->string('child_reception')->nullable();
            $table->text('notes')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_reports');
    }
};
