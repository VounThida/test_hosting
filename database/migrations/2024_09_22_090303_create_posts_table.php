<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Post title or name
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key for category
            $table->string('image')->nullable(); // Optional image field
            $table->timestamps(); // Created at and updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
