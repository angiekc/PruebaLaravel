<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Relación entre la entidad states y movies (1...n)
        Schema::table('users', function ($table)
        {
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });

        //Relaciones entre la entidad states y movies (1...n) y users - movies (1...n)
        Schema::table('movies', function ($table)
        {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });

        //Relación entre la entidad states y categories (1...n)
        Schema::table('categories', function ($table)
        {
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });

        //Relaciones entre las entidades movies y categories (m...n), y states - movies_categories (1...n)
        Schema::table('category_movie', function ($table)
        {
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade');
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
