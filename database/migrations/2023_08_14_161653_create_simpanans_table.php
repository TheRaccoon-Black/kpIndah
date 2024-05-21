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
        Schema::create('simpanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->integer('tipe');
            $table->integer('nominal');
            $table->date('tanggal');
            $table->timestamps();
        });

        DB::table('simpanans')->insert([
            ['user_id' => '2',
            'tipe' => '100000',
            'nominal' => '50000',
            'tanggal' => '2023-08-12',
            ]
        ]);
        
        DB::table('simpanans')->insert([
            ['user_id' => '2',
            'tipe' => '100000',
            'nominal' => '50000',
            'tanggal' => '2023-08-12',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simpanans');
    }
};
