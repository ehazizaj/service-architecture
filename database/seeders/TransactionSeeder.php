<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('transactions')->get()->count() == 0) {
            DB::table('transactions')->insert([
                'code' => "T_218_ljydmgebx",
                'amount' => "8617.19",
                'user_id' => 375,
                'created_at' => now(),
            ]);
            DB::table('transactions')->insert([
                'code' => "T_335_wmhrbjxld",
                'amount' => "6502.72",
                'user_id' => 1847,
                'created_at' => now(),
            ]);
            DB::table('transactions')->insert([
                'code' => "T_327_shqnyrctz",
                'amount' => "101.26",
                'user_id' => 3031,
                'created_at' => now(),
            ]);

        } else {
            echo "Table is not empty, therefore NOT ";
        }
    }

}
