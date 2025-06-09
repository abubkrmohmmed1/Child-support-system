<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'report_date',
        'day',
        'check_in',
        'check_out',
        'had_issue',
        'issue_description',
        'issue_resolution',
        'sessions_count',
        'attendees_count',
        'absentees_count',
        'has_case_study',
        'case_studies_count',
        'class_absentees_count',
        'parent_psych_status',
        'child_reception',
        'notes',
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
