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
        Schema::create('researchers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->foreignId('faculty_id')->constrained('faculties');
            $table->foreignId('department_id')->constrained('departments');
            $table->string('research_title', 100);
            $table->string('file', 255);
            $table->foreignId('old_position_id')->constrained('positions');
            $table->foreignId('new_position_id')->constrained('positions');
            $table->tinyInteger('agreement')->default(0);
            $table->integer('protocol');
            $table->text('scientific_research_works');
            $table->text('proposal_determine_topic');
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
        Schema::dropIfExists('researchers');
    }
};