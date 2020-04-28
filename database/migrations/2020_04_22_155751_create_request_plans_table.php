<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('request_user_id')->unsigned()->index();
            $table->integer('plan_id')->unsigned()->index();
            $table->integer('plan_status');
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
        Schema::dropIfExists('request_plans');
    }
}
