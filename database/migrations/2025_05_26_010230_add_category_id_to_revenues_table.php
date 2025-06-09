<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('revenues', function (Blueprint $table) {
        $table->unsignedBigInteger('category_id')->nullable()->after('child_id');
        // If you want to enforce foreign key:
        // $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('revenues', function (Blueprint $table) {
        $table->dropColumn('category_id');
    });
}
};
