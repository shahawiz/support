<?php

use Illuminate\Database\Seeder;
use App\database\seeds;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TicketSeeder::class);
    }
}
