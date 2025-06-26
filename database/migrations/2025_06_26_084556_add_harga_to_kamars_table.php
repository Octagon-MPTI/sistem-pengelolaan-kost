<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('kamars', function (Blueprint $table) {
        $table->integer('harga')->after('fasilitas'); // sesuaikan posisi jika perlu
    });
}

public function down()
{
    Schema::table('kamars', function (Blueprint $table) {
        $table->dropColumn('harga');
    });
}

};
