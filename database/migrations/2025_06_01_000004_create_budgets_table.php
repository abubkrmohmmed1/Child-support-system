<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('financial_period_id');
            $table->decimal('expected_amount', 15, 2);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('budgets');
    }
};