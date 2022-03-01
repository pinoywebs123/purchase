<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::create([
            'name'  => 'Pending'
        ]);

        Status::create([
            'name'  => 'Approve'
        ]);

        Status::create([
            'name'  => 'Ship Out'
        ]);

        Status::create([
            'name'  => 'Received'
        ]);
    }
}
