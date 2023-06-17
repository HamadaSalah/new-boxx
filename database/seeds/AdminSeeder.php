<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
            'name' => 'hamada',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12332100'),
            'super' => 1
        ]);
        $user->givePermissionTo('Super');
    }
}
