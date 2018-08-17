// app/database/seeds/UserTableSeeder.php

<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder
{

public function run()
{
    DB::table('users')->delete();
    User::create(array(
        'name'     => 'rjms admin',
        'username' => 'rjmsadmin',
        'password' => Hash::make('admin123'),
    ));
}

}