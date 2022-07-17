<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::create([
            'brand' => 'Branch 1'
        ]);
        Branch::create([
            'brand' => 'Branch 2'
        ]);
    }
}
