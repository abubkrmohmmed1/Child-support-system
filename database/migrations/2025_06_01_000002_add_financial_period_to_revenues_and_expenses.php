<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('revenues', function (Blueprint $table) {
            $table->unsignedBigInteger('financial_period_id')->nullable()->after('id');
        });
        Schema::table('expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('financial_period_id')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('revenues', function (Blueprint $table) {
            $table->dropColumn('financial_period_id');
        });
        Schema::table('expenses', function (Blueprint $table) {
            $table->dropColumn('financial_period_id');
        });
    }
};