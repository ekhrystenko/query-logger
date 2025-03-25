<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('query_logs', function (Blueprint $table) {
            $table->id();
            $table->string('query', 2000);  // SQL-запит
            $table->text('bindings')->nullable();  // Параметри запиту
            $table->float('time');  // Час виконання
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('query_logs');
    }
};