<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder {

  public function run()
  {

    Eloquent::unguard();

    Admin::create(array(
      'username' => 'admin',
      'password' => Hash::make('admin')
    ));

  }
}
