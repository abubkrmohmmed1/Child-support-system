<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
        'child_id', 'category_id', 'payment_method', 'description', 'amount', 'date',
        'bank_name', 'bank_account', 'installment_count', 'installment_value', 'financial_period_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function financialPeriod()
    {
        return $this->belongsTo(FinancialPeriod::class);
    }

    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class, 'account_id');
    }

    public function child()
    {
        return $this->belongsTo(Child::class);
    }
}
