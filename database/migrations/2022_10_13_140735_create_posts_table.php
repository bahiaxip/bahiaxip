<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("body_main");
            $table->text("body_plus")->nullable();
            $table->integer("category_id")->unsigned();
            $table->integer("user_id")->unsigned();
            $table->string("slug")->unique();
            $table->enum("status",["PUBLISHED", "DRAFT"])->default("DRAFT");
            $table->string("file")->nullable();
            
            //Relación
            /*
            $table->foreign("user_id")->references("id")->on("users")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            
            $table->foreign("category_id")->references("id")->on("categories")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
