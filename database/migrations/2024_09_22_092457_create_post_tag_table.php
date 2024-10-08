<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTagTable extends Migration
{
    public function up()
    {
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id(); // Primary key for the pivot table
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Foreign key for posts
            $table->foreignId('tag_id')->constrained()->onDelete('cascade'); // Foreign key for tags
            $table->timestamps(); // Optional timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('post_tag');
    }
}

