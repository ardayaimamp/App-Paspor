<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhotosToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('foto_ktp')->nullable();
            $table->string('foto_self')->nullable()->default('file_/default_user.png');
            $table->string('akta_kelahiran')->nullable();
            $table->string('kartu_keluarga')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('foto_ktp');
            $table->dropColumn('foto_self');
        });
    }
}
