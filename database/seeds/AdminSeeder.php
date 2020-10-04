<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User([
            'name' => 'Viktor',
            'email' => 'vik.z.1995@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Uposword5'),
            'remember_token' => Str::random(10),
            'role' => 'admin'
        ]);
        $admin->save();
    }
}
