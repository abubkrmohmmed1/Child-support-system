<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable = ['category_id', 'financial_period_id', 'expected_amount'];

    public function category() { return $this->belongsTo(Category::class); }
    public function period() { return $this->belongsTo(FinancialPeriod::class, 'financial_period_id'); }
}