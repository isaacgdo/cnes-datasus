<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professionals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cns');
            $table->date('assignment_date');
            $table->string('workload');
            $table->string('sus');
            $table->integer('cbo_id');
            $table->integer('bond_id');
            $table->integer('type_id');
            $table->string('origin');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('cbo_id')->references('id')->on('cbos');
            $table->foreign('bond_id')->references('id')->on('bonds');
            $table->foreign('type_id')->references('id')->on('types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('professionals', function (Blueprint $table) {
            $table->dropForeign(['cbo_id']);
            $table->dropForeign(['bond_id']);
            $table->dropForeign(['type_id']);
        });
        Schema::dropIfExists('professionals');
    }
}
