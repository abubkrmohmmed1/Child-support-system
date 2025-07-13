<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    protected $fillable = [
        'date',
        'letter_number', 
        'recipient',
        'subject',
        'body',
        'signature'
    ];

    // وظيفة لحساب طول نص الرسالة
    public function calculateBodyLength()
    {
        return strlen($this->body);
    }
}
