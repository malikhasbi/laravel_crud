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
        Schema::table('siswa', function (Blueprint $table) {
            $table->string('tempat', 30)->default('kota')->after('nama');
            $table->date('tgl_lahir')->nullable()->after('tempat');
            $table->string('kelas', 30)->after('tgl_lahir');
            $table->string('image', 255)->nullable()->default('default.png')->after('jurusan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('siswa', function (Blueprint $table) {
            if (Schema::hasColumn('siswa', 'tempat')) {
                $table->dropColumn('tempat');
            }
            if (Schema::hasColumn('siswa', 'tgl_lahir')) {
                $table->dropColumn('tgl_lahir');
            }
            if (Schema::hasColumn('siswa', 'kelas')) {
                $table->dropColumn('kelas');
            }
            if (Schema::hasColumn('siswa', 'image')) {
                $table->dropColumn('image');
            }
        });
    }
};
