<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->integer('quantity');
            $table->integer('genre');
            $table->date('publication_year');
            $table->integer('isbn')->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
