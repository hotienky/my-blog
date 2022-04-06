<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = new Setting;
        $setting->owner = 'Ho Tien Ky';
        $setting->bio = "Hi, I'm Ho Tien Ky. I live in Ho Chi Minh, Viet Nam, Indonesia. I'm Web Developer with PHP (Laravel), React Js, Next Js and Mobile Developer with React Native. You can see my portfolio in my Github";
        $setting->web_portfolio = 'https://github.com/hotienky';
        $setting->fb = 'https://www.facebook.com/kyhotienn/';
        $setting->twitter = '';
        $setting->instagram = '';

        $setting->save();

        $this->command->info('Setting berhasil');
    }
}
