<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('child_id');
            $table->decimal('amount', 15, 2);
            $table->string('description')->nullable();
            $table->date('due_date')->nullable();
            $table->timestamps();

            $table->foreign('child_id')->references('id')->on('children')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fees');
    }
};