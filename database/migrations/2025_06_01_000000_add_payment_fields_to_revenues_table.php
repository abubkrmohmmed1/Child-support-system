<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('revenues', function (Blueprint $table) {
            $table->string('payment_method')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->integer('installment_count')->nullable();
            $table->decimal('installment_value', 15, 2)->nullable();
        });
    }

    public function down()
    {
        Schema::table('revenues', function (Blueprint $table) {
            $table->dropColumn(['payment_method', 'bank_name', 'bank_account', 'installment_count', 'installment_value']);
        });
    }
};