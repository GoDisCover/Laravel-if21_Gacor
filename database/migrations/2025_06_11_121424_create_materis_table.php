<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->biginteger("id")->autoIncrement();
            $table->primary('id');
            $table->biginteger('matakuliah_id');
            $table->foreign('matakuliah_id')->references('id')->on('matakuliah')->onDelete('restrict')->onUpdate('restrict');
            $table->biginteger('dosenid')->unsigned();
            $table->foreign('dosenid')->references('id')->on('users');
            $table->biginteger('pertemuan');
            $table->string('pokokbahasan');
            $table->string('filemateri');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi');
    }
};
