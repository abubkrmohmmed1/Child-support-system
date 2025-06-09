<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'report_type',
        'report_date',
        'health_status',
        'education_status',
        'psychological_status',
        'notes',
    ];

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
