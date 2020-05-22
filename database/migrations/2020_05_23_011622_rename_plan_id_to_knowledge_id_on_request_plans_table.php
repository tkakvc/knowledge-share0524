<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenamePlanIdToKnowledgeIdOnRequestPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_plans', function (Blueprint $table) {
            $table->renameColumn('knowledge_id', 'plan_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('request_plans', function (Blueprint $table) {
            $table->renameColumn('knowledge_id', 'plan_id');
        });
    }
}
