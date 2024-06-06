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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->decimal('standard_rack_rate', 8, 2);
            $table->foreignId('location_id');
            // $table->foreignId('contact_id')->nullable();
            $table->string('amenities_id')->nullable();
            $table->string('accommodation_type_id');
            $table->integer('available_rooms');
            $table->integer('capacity');
            $table->string('images')->default('default.png');
            $table->string('check_in_time')->nullable();
            $table->string('check_out_time')->nullable();
            $table->text('policies')->nullable();
            $table->timestamps();
        });

        DB::table('accommodations')->insert([
            'name' => 'Panorama Hotel',
            'slug' => 'panorama-hotel',
            'description' => 'Panorama Hotel is a 3-star hotel located in the heart of Naivasha, Kenya',
            'standard_rack_rate' => 5000.00,
            'location_id' => 1,
            'amenities_id' => '1,2,3',
            'accommodation_type_id' => '1',
            'available_rooms' => 20,
            'capacity' => 40,
            'images' => 'panorama-hotel.jpg',
            'check_in_time' => '12:00',
            'check_out_time' => '10:00',
            'policies' => 'Check-in time is 12:00 and check-out time is 10:00',
        ]);

        DB::table('locations')->insert([
           ['id' => 1 , 'name' => 'Lakeview', 'slug' => 'lakeview'],
           ['id' => 2 , 'name' => 'South Lake', 'slug' => 'south-lake'],
        ]);

        DB::table('amenities')->insert([
            ['name' => 'Free Wi-Fi', 'slug' => 'free-wifi', 'icon' => 'wifi-icon', 'is_active' => true],
            ['name' => 'Free Parking', 'slug' => 'free-parking', 'icon' => 'parking-icon', 'is_active' => true],
            ['name' => 'Security', 'slug' => 'security', 'icon' => 'security-icon', 'is_active' => true]
        ]);

       DB::table('accommodation_types')->insert([
        ['id' => 1 , 'name' => 'Five Bedroom', 'slug' => 'five-bedroom'],
        ['id' => 2 , 'name' => 'Four Bedroom', 'slug' => 'four-bedroom'],
       ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
