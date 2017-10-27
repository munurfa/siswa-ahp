<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $this->call(SiswasSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(BandingKriteriaSeeder::class);
    }
}
