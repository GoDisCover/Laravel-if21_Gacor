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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->biginteger("id")->autoIncrement();
            $table->primary('id');
            $table->string('tahun_akademik');
            $table->string('kode_smt');
            $table->string('kelas');
            $table->biginteger('mata_kuliah_id');
            $table->foreign('mata_kuliah_id')->references('id')->on('matakuliah')->onDelete('restrict')->onUpdate('restrict');
            $table->biginteger('dosenid')->unsigned();
            $table->foreign('dosenid')->references('id')->on('users');
            $table->biginteger('sesi_id');
            $table->foreign('sesi_id')->references('id')->on('sesi')->onDelete('restrict')->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
