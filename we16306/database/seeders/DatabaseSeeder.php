<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Room;
use App\Models\Position;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // trong models user cos trait HasFactory
        // co userFactory da dinh nghia du lieu mau
        // Models::factory('so du lieu goc)
        // \App\Models\User::factory(10)->create();
        // neu da chay seeder cho Room User thi co the comment vao de k chay lai
        // Room::factory('10')->create();
        // User::factory('10')->create();
        Position::factory('10')->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
