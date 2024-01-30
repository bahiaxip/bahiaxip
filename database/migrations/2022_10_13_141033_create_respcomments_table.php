<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespcommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respcomments', function (Blueprint $table) {
            $table->id();
            $table->text("body");
            $table->integer("comment_id")->unsigned();
            /*
            $table->foreign("comment_id")->references("id")->on("comments")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            */
            $table->integer("user_id")->unsigned();
            /*
            $table->foreign("user_id")->references("id")->on("users")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            */
            $table->integer("post_id")->unsigned();
            /*
            $table->foreign("post_id")->references("id")->on("posts")
                    ->onDelete("cascade")
                    ->onUpdate("cascade");
            */
            //$table->enum("status",["PUBLISHED","DRAFT"])->default("DRAFT");
            $table->integer("statusint")->default(0);
            $table->date("fecha");
            $table->time("hora");
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
        Schema::dropIfExists('respcomments');
    }
}
