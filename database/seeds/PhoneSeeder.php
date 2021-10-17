<?php

use App\Models\Phone;
use Faker\Core\Number;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Phone::class, 1000)->create();
    }
}
