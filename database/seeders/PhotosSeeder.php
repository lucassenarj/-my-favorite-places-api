<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Photos;

class PhotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photos::factory(500)->create();
    }
}
