<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubSectionSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_section_subs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sub_section_id')->unsigned();
            $table->foreign('sub_section_id')->references('id')->on('sub_sections')->onDelete('cascade');
            $table->string('title',500);
            $table->string('title_ar',500);
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
        Schema::dropIfExists('sub_section_subs');
    }
}
