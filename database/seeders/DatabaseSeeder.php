<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Nationality;
use App\Models\Price;
use App\Models\Role;
use App\Models\User;
use App\Models\WorkShop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        Price::factory(1)->create();
        Price::factory(1)->create(['price'=> 350 , "currancy" => "EGP", "symbol" => "£", ]);
        Price::factory(1)->create(['price'=> 2300  , "currancy" => "EGP", "symbol" => "£", ]);
        Price::factory(1)->create(['price'=> 1000  , "currancy" => "EGP", "symbol" => "£", ]);
        Price::factory(1)->create(['price'=> 300 , "currancy" => "EGP", "symbol" => "£", ]);
        Price::factory(1)->create(['price'=> 1800 , "currancy" => "EGP", "symbol" => "£", ]);
        Price::factory(1)->create(['price'=> 650  , "currancy" => "EGP", "symbol" => "£", ]);
        Price::factory(1)->create(['price'=> 250 , "currancy" => "EGP", "symbol" => "£", ]);
        Price::factory(1)->create(['price'=> 1400 , "currancy" => "EGP", "symbol" => "£", ]);
        Price::factory(1)->create(['price'=> 100 , "currancy" => "USD", "symbol" => "$", ]);
        Price::factory(1)->create(['price'=> 25 , "currancy" => "USD", "symbol" => "$", ]);
        Price::factory(1)->create(['price'=> 180 , "currancy" => "USD", "symbol" => "$", ]);
        Price::factory(1)->create(['price'=> 80 , "currancy" => "USD", "symbol" => "$", ]);
        Price::factory(1)->create(['price'=> 20 , "currancy" => "USD", "symbol" => "$", ]);
        Price::factory(1)->create(['price'=> 150 , "currancy" => "USD", "symbol" => "$", ]);
        Price::factory(1)->create(['price'=> 60 , "currancy" => "USD", "symbol" => "$", ]);
        Price::factory(1)->create(['price'=> 120 , "currancy" => "USD", "symbol" => "$", ]);
        Nationality::factory(1)->create();
        Nationality::factory(1)->create(['nation'=>'non-Egyption']);
        WorkShop::factory(1)->create();
        WorkShop::factory(1)->create(['name'=> 'All']);
        Role::factory(1)->create();
        Role::factory(1)->create(['role_type'=>'Faculty Member']);
        Role::factory(1)->create(['role_type'=>'guest']);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
