<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;

class DonationSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Donation::factory(20)->create();  // Menghasilkan 20 data dummy Donation
    }
}
