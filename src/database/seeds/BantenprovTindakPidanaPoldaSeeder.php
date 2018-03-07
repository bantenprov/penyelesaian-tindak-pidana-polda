<?php

use Illuminate\Database\Seeder;

class BantenprovTindakPidanaPoldaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(BantenprovTindakPidanaPoldaSeederTindakPidanaPolda::class);
    }
}
