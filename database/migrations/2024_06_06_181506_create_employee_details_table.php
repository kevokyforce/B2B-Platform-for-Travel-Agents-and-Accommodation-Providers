<?php

use Illuminate\Support\Facades\DB;
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
        Schema::create('employee_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->foreignId('designation_id');
            $table->foreignId('department_id');
            $table->string('gender');
            $table->string('status')->default('Active');
            $table->string('dob');
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('zip_code')->nullable();
            $table->timestamps();
        });

        DB::table('employee_details')->insert([
            'employee_id' => 3,
            'designation_id' => 1,
            'department_id' => 1,
            'phone_number' => '1234567890',
            'address' => '123 Main St',
            'status' => 'Active',
            'gender' => 'Male',
            'dob' => '27-03-1996',
            'city' => 'New York',
            'state' => 'NY',
            'country' => 'USA',
            'zip_code' => '10001',
            'created_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_details');
    }
};
