<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameKnowledgeIdToPlanIdOnRequestPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('request_plans', function (Blueprint $table) {
            $table->renameColumn('plan_id', 'knowledge_id');
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
            $table->renameColumn('plan_id', 'knowledge_id');
        });
    }
}
