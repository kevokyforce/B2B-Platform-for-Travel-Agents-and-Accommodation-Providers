<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */                                        
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['id' => 1, 'title' => 'Super Administrator'],
            ['id' => 2, 'title' => 'Administrator'],
            ['id' => 3, 'title' => 'Employee'],
            ['id' => 4, 'title' => 'Agent'],
            ['id' => 5, 'title' => 'Customer'],
        ]);

        DB::table('users')->insert([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'role_id' => 1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make(env('DEFAULT_PASSWORD')),
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => 'Employee',
            'last_name' => 'User',
            'role_id' => 3,
            'email' => 'employee@gmail.com',
            'password' => Hash::make(env('DEFAULT_PASSWORD')),
            'email_verified_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
