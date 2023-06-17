<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'logo' => 'logo.png',
            'BoxImg' => 'default.png',
            'name' => 'The?Box',
            'slid1_img' => 'man.png',
            'slid1_intro_en' => 'Mystery Box Wait For You',
            'slid1_intro_ar' => 'Mystery Box Wait For You',
            'slid2_img' => 'man.png',
            'slid2_intro_en' => 'Mystery Box Wait For You',
            'slid2_intro_ar' => 'Mystery Box Wait For You',
            'slid3_img' => 'man.png',
            'slid3_intro_en' => 'Mystery Box Wait For You',
            'slid3_intro_ar' => 'Mystery Box Wait For You',
            'box_intro_en' => 'OPEN MYSTERY BOXES ONLINE',
            'box_intro_ar' => 'OPEN MYSTERY BOXES ONLINE',
            'WebsiteStatus'=>0,
            'CopyRights_en' => 'All Rights Reserved &copy; 2021',
            'CopyRights_ar' => '  2021 &copy; جميع الحقرق محفوظه',
        ]);
    }
}
