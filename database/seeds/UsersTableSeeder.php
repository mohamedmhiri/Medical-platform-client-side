<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Database\Eloquent\Model;
class UsersTableSeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {


    Model::unguard();
    DB::table('users')->delete();

      $users = array(
              ['name' => 'Mohamed Mhiri', 'email' => 'mohamed@gmail.com', 'password' => Hash::make('secret')],
              ['name' => 'Omar Mhiri', 'email' => 'omar@gmail.com', 'password' => Hash::make('secret')],
              ['name' => 'Awatef Louati', 'email' => 'awatef@gmail.com', 'password' => Hash::make('secret')],
              ['name' => 'Ahmed Louati', 'email' => 'ahmed@gmail.com', 'password' => Hash::make('secret')],
      );

      // Loop through each user above and create the record for them in the database
      foreach ($users as $user)
      {
          User::create($user);
      }
      Model::reguard();


  }

}
