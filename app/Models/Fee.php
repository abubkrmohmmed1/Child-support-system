<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $fillable = [
        'child_id',
        'amount',
        'description',
        'due_date',
        // Add any other relevant fields
    ];

    public function child()
    {
        return $this->belongsTo(Child::class, 'child_id');
    }
}