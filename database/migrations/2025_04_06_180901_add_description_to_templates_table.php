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
    Schema::table('templates', function (Blueprint $table) {
        $table->text('description')->nullable(); // Menambahkan kolom deskripsi
    });
}

public function down()
{
    Schema::table('templates', function (Blueprint $table) {
        $table->dropColumn('description'); // Untuk rollback
    });
}

};
