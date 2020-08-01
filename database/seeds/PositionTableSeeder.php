<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\Position;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'admin'
        ]);
        Position::create([
            'name' => 'asesor'
        ]);
        Position::create([
            'name' => 'tuk'
        ]);
    }
}
