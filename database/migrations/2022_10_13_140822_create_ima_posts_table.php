<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImaPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ima_posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("detail")->nullable();            
            $table->string("width")->nullable();
            $table->string("height")->nullable();
            $table->string("path");
            $table->integer("post_id")->unsigned();
            
            /*
            $table->foreign("post_id")->references("id")->on("posts")
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
        Schema::dropIfExists('ima_posts');
    }
}
