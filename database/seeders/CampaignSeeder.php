<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Campaign;

class CampaignSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Campaign::factory(10)->create();  // Menghasilkan 10 data dummy Campaign
    }
}
