<?php

namespace Database\Seeders;

use App\Models\References;
use App\Models\Settings;
use Illuminate\Database\Seeder;
use League\CommonMark\Reference\Reference;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Settings::create([
            'key' => 'overtime_method',
            'value' => 1
        ]);

        References::create([
            'code' => 'overtime_method',
            'name' => 'Salary / 173',
            'expression' => '(salary / 173) * overtime_duration_total',
        ]);
        References::create([
            'code' => 'overtime_method',
            'name' => 'Fixed',
            'expression' => '10000 * overtime_duration_total',
        ]);

    }
}
