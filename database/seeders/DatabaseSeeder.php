<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Customer;
use App\Models\Offer;
use App\Models\Tech;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        Tech::create([
            "title" => "HTML"
        ]);

        User::create([
            "name" => "Demo User",
            "email" => "demo@metatige.com",
            "password" => Hash::make('1234')
        ]);

        Customer::create([
            "name" => "Demo Customer",
            "company" => "Test Company",
            "email" => "company@metatige.com",
            "phone" => "123456789",
            "gsm" => "123456789",
            "website" => "www.metatige.com",
            "address" => "Test Address",
            "country" => "Test Country",
            "city" => "Test City",
            "status" => 1
        ]);

        Offer::create([
            "customer" => 1,
            "title" => "Test Offer",
            "detail" => "Test Detail",
            "status" => 1
        ]);

    }
}
