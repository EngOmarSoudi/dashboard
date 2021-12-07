<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreatePhotoablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photoables', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('filename');
            $table->string('photoable_id');
            $table->string('photoable_type');
            $table->timestamps();
        });
        DB::table('photoables')->insert([
            'filename' =>  'default.png',
            'photoable_id' => 1,
            'photoable_type' => 'App\Models\User',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photoables');
    }
}
