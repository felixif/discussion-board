<?php

namespace Database\Seeders;

use App\Models\Phone;
use Illuminate\Database\Seeder;

class PhoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ph = new Phone;
        $ph->phone_no = "07252-111-222";
        $ph->user_id = 1;
        $ph->save();

        $phones = Phone::factory()->count(10)->create();
    }
}
