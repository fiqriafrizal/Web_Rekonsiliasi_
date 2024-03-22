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
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->enum('dataReferensi',['bank', 'bankplus', 'biller']);
            $table->enum('file',['xls', 'xlsx', 'csv']);
            $table->enum('dataAcuan',['bank', 'bankplus', 'biller']);
            $table->string('fileAcuan');
            $table->string('fileReferensi1');
            $table->string('fileReferensi2');
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
        Schema::dropIfExists('steps');
    }
};
