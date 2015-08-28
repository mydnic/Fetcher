<?php
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(array(
            'email'     => 'admin@fetch.er',
            'password'  => Hash::make('123456'),
            'superuser' => true,
        ));
    }
}
