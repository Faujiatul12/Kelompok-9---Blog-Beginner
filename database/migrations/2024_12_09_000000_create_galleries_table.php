<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    public function up()
    {
        Schema::create('galeri', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('kota');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('galleries');
    }
}
