<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name'        => 'Admin',
            'last_name'         => 'Ako',
            'address'           => 'Fair View, Quezon City',
            'company_name'      => 'Morley Construction Inc',
            'company_nature'    => 'Construction Company',
            'email'             => 'admin@yahoo.com',
            'contact'           => '09650918853',
            'password'          => bcrypt('admin123'),
        ]);

        $user->assignRole('admin');
    }
}
