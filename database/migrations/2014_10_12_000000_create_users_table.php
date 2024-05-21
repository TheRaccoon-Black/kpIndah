<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nip');
            $table->string('email')->unique();
            $table->string('avatar')->nullable();
            $table->string('no_hp');
            $table->string('alamat');
            $table->char('jenis_kelamin', 1);
            $table->enum('role', ['admin', 'anggota', 'kepala_koperasi'])->default('anggota');
            $table->date('tanggal_masuk');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'nama' => 'Zirva',
                'nip' => '123456789',
                'email' => 'Zirva@gmail.com',
                'avatar' => 'abc',
                'no_hp' => '082345678922',
                'alamat' => 'Pedalaman',
                'jenis_kelamin' => 'P',
                'role' => 'admin',  // corrected role
                'tanggal_masuk' => '2019-11-02',
                'password' => Hash::make('123456789'),
            ],
            [
                'nama' => 'Zaitul',
                'nip' => '2214356757',
                'email' => 'Zaitul@gmail.com',
                'avatar' => 'sdhsdh.jpg',
                'no_hp' => '2322321',
                'alamat' => 'Padang',
                'jenis_kelamin' => 'P',
                'role' => 'anggota',
                'tanggal_masuk' => '2019-11-02',
                'password' => Hash::make('123456789'),
            ],
            [
                'nama' => 'Qolbi',
                'nip' => '1234567343',
                'email' => 'Qolbi@gmail.com',
                'avatar' => 'abc',
                'no_hp' => '082345678922',
                'alamat' => 'pariaman',
                'jenis_kelamin' => 'P',
                'role' => 'kepala_koperasi',
                'tanggal_masuk' => '2019-11-02',
                'password' => Hash::make('1234567899'),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
