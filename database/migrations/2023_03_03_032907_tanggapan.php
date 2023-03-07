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
        Schema::create('tanggapan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pengaduan')->unsigned();
            $table->unsignedInteger('id_admin')->unsigned();
            $table->date('tgl_tanggapan');
            $table->text('tanggapan');
            $table->timestamps();

            $table->foreign('id_pengaduan')->references('id')->on('pengaduan')->onDelete('cascade');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tanggapan');
    }
};
?>
