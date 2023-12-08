<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->text('description')->nullable();
        $table->timestamp('added_date')->default(now());
        $table->enum('status', ['Not Started', 'Doing', 'Finished'])->default('Not Started');
        $table->timestamps();
    });
}

};
