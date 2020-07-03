<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(CircuitosSeeder::class);
        $this->call(EscuderiasSeeder::class);
        $this->call(PuntosSeeder::class);
        $this->call(ParticipantesSeeder::class);
        $this->call(CampeonatosSeeder::class);
        $this->call(UserSeeder::class);
    }
}