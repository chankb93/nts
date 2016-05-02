<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call('NapfaSeeder');
        $this->command->info('nts seeded');
        // $this->call(UsersTableSeeder::class);
    }
}

class NapfaSeeder extends Seeder {
    public function run() {
        DB::table('NapfaDates')->delete();

        DB::table('NapfaDates')->insert([
            'regOpenDate' => new DateTime('1-3-2016'),
            'regCloseDate' => new DateTime('1-6-2016')
        ]);
    }
}
