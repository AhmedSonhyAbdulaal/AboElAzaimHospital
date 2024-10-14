<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Nationality;
use App\Models\Price;
use App\Models\Role;
use App\Models\User;
use App\Models\WorkShop;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        WorkShop::factory(1)->create(['nameAR'=> 'الكل', 'nameEN'=> 'All']);
        WorkShop::factory(1)->create(['nameAR'=> 'الجلسة العملية الاولى', 'nameEN'=> '1st Scintific Session', 'is_primary'=>false]);
        WorkShop::factory(1)->create(['nameAR'=> 'الجلسة العملية الثانية', 'nameEN'=> '2st Scintific Session', 'is_primary'=>false]);
        WorkShop::factory(1)->create(['nameAR'=> 'الجلسة العملية الثالثة', 'nameEN'=> '3st Scintific Session', 'is_primary'=>false]);
        WorkShop::factory(1)->create(['nameAR'=> 'ورشة العمل الأولى (التأهيل النفسي لحالات الأمراض النفسية الناتجة عن أمراض المخ العضوية)', 'nameEN'=> '1st Workshop(Rehabilitation of OBS)s', 'is_primary'=>false]);
        WorkShop::factory(1)->create(['nameAR'=> 'ورشة العمل الثانية (أمراض المخ المزمنة)', 'nameEN'=> '2st Workshop(Chronic Brain Diseases)', 'is_primary'=>false]);
        WorkShop::factory(1)->create(['nameAR'=> 'ورشة العمل الثالثة (دور التمريض في الخطة العلاجية لحالات الأمراض النفسية الناتجة عن أمراض المخ العضوية)', 'nameEN'=> '3st Workshop(Nursing Role in OBS)', 'is_primary'=>false]);
        WorkShop::factory(1)->create(['nameAR'=> 'ورشة العمل الرابعة (التشخيص السيكومتري المبكر لإكتشاف حالات الإصابة العضوية للمخ)', 'nameEN'=> '4st Workshop(Psychometry of OBS)', 'is_primary'=>false]);
        Role::factory(1)->create();
        Role::factory(1)->create(['role_type'=>'Faculty Member']);
        Role::factory(1)->create(['role_type'=>'Guest']);
        DB::insert(
            'insert into nationalities_roles_prices_work_shops'
            .'(price_id,nation_id,role_id,work_shop_id,created_at,updated_at)'
            ."values(7,1,1,1,now(),now()),"  //eg,std,con
            ."(9,1,1,2,now(),now()),"  //eg,std,all
            ."(8,1,1,3,now(),now()),"  //eg,std,wsh
            ."(8,1,1,4,now(),now()),"  //eg,std,wsh
            ."(8,1,1,5,now(),now()),"  //eg,std,wsh
            ."(8,1,1,6,now(),now()),"  //eg,std,wsh
            ."(8,1,1,7,now(),now()),"  //eg,std,wsh
            ."(8,1,1,8,now(),now()),"  //eg,std,wsh
            ."(8,1,1,9,now(),now()),"  //eg,std,wsh

            ."(4,1,2,1,now(),now()),"  //eg,fuc,con
            ."(6,1,2,2,now(),now()),"  //eg,fuc,all
            ."(5,1,2,3,now(),now()),"  //eg,fuc,wsh
            ."(5,1,2,4,now(),now()),"  //eg,fuc,wsh
            ."(5,1,2,5,now(),now()),"  //eg,fuc,wsh
            ."(5,1,2,6,now(),now()),"  //eg,fuc,wsh
            ."(5,1,2,7,now(),now()),"  //eg,fuc,wsh
            ."(5,1,2,8,now(),now()),"  //eg,fuc,wsh
            ."(5,1,2,9,now(),now()),"  //eg,fuc,wsh

            ."(1,1,3,1,now(),now()),"  //eg,gst,con
            ."(3,1,3,2,now(),now()),"  //eg,gst,all
            ."(2,1,3,3,now(),now()),"  //eg,gst,wsh
            ."(2,1,3,4,now(),now()),"  //eg,gst,wsh
            ."(2,1,3,5,now(),now()),"  //eg,gst,wsh
            ."(2,1,3,6,now(),now()),"  //eg,gst,wsh
            ."(2,1,3,7,now(),now()),"  //eg,gst,wsh
            ."(2,1,3,8,now(),now()),"  //eg,gst,wsh
            ."(2,1,3,9,now(),now()),"  //eg,gst,wsh


            ."(16,2,1,1,now(),now()),"  //non,std,con
            ."(17,2,1,2,now(),now()),"  //non,std,all
            ."(14,2,1,3,now(),now()),"  //non,std,wsh
            ."(14,2,1,4,now(),now()),"  //non,std,wsh
            ."(14,2,1,5,now(),now()),"  //non,std,wsh
            ."(14,2,1,6,now(),now()),"  //non,std,wsh
            ."(14,2,1,7,now(),now()),"  //non,std,wsh
            ."(14,2,1,8,now(),now()),"  //non,std,wsh
            ."(14,2,1,9,now(),now()),"  //non,std,wsh

            ."(13,2,2,1,now(),now()),"  //non,fuc,con
            ."(15,2,2,2,now(),now()),"  //non,fuc,all
            ."(14,2,2,3,now(),now()),"  //non,fuc,wsh
            ."(14,2,2,4,now(),now()),"  //non,fuc,wsh
            ."(14,2,2,5,now(),now()),"  //non,fuc,wsh
            ."(14,2,2,6,now(),now()),"  //non,fuc,wsh
            ."(14,2,2,7,now(),now()),"  //non,fuc,wsh
            ."(14,2,2,8,now(),now()),"  //non,fuc,wsh
            ."(14,2,2,9,now(),now()),"  //non,fuc,wsh

            ."(10,2,3,1,now(),now()),"  //non,gst,con
            ."(12,2,3,2,now(),now()),"  //non,gst,all
            ."(11,2,3,3,now(),now()),"  //non,gst,wsh
            ."(11,2,3,4,now(),now()),"  //non,gst,wsh
            ."(11,2,3,5,now(),now()),"  //non,gst,wsh
            ."(11,2,3,6,now(),now()),"  //non,gst,wsh
            ."(11,2,3,7,now(),now()),"  //non,gst,wsh
            ."(11,2,3,8,now(),now()),"  //non,gst,wsh
            ."(11,2,3,9,now(),now())"  //non,gst,wsh
        );
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
