<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("surnames")->nullable();
            $table->string("province")->nullable();
            $table->string("country")->nullable();
            $table->string("sex")->nullable();
            $table->date("birth_date")->nullable();
            $table->string("newsletter")->nullable();
            $table->integer("user_id");
            $table->string("file")->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
