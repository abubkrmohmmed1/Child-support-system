<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'account_name',
        'account_number',
        'method', // نوع الحساب: بنك، كاش، شيك، إلخ
        'balance', // الرصيد الحالي
        // Add other fields as needed
    ];

    public function revenues()
    {
        return $this->hasMany(Revenue::class);
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}