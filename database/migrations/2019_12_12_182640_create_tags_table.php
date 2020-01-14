<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create Tables
        Schema::create('hashtags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('color');
            $table->bigInteger('daily')->default(0);
            $table->bigInteger('wins')->default(0);
        });

        // Insert data 
        DB::table('hashtags')->insert([
            ['name' => '@MercedesAMGF1', 'color' => '#00D2BE'],
            ['name' => '@redbullracing', 'color' => '#1E41FF'],
            ['name' => '@ScuderiaFerrari', 'color' => '#DC0000'],
            ['name' => '@WilliamsRacing', 'color' => '#FFFFFF'],
            ['name' => '@McLarenF1', 'color' => '#FF8700'],
            ['name' => '@HaasF1Team', 'color' => '#F0D787'],
            ['name' => '@alfaromeoracing', 'color' => '#9B0000'],
            ['name' => '@ToroRosso', 'color' => '#469BFF'],
            ['name' => '@RacingPointF1', 'color' => '#F596C8'],
            ['name' => '@RenaultF1Team', 'color' => '#FFF500'],
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hashtags');
    }
}
