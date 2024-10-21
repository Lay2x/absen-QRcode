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
        Schema::create('presensipulang', function (Blueprint $table) {
            $table->increments('id_pulang');
            $table->string('id_dataguru');
            $table->string('status_kepulangan');
            $table->string('waktu_presensi_hari');
            $table->string('waktu_presensi_jam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
