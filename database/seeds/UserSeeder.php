<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new App\User;
        $administrator->name = 'Ho Tien Ky';
        $administrator->email = 'ky@admin.com';
        $administrator->password = \Hash::make('kydeptrai');

        $administrator->save();

        $this->command->info('User Admin has been inserted');
    }
}
