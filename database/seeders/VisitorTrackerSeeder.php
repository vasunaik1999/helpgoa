<?php

namespace Database\Seeders;

use App\Models\VisitorTracker;
use Illuminate\Database\Seeder;

class VisitorTrackerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = VisitorTracker::create([
            'visitors' => '0',
            'unique_visitors' => '0',
        ]);
    }
}
