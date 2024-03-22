<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contohs', function (Blueprint $table) {
            $table->id();
            $table->enum('jenisData', ['bank', 'bankplus', 'biller']);
            $table->enum('file', ['xls', 'xlsx', 'csv']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contohs');
    }
};
