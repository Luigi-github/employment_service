<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->integer('experience_required');
            $table->float('salary');
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('person_id')->nullable();
            $table->boolean('available')->default(1);
            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('person_id')->references('id')->on('people');
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
        Schema::dropIfExists('positions');
    }
};
