<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'clients';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['name', 'password','validUntil','isValid'];

  /**
   * The attributes excluded from the model's JSON form.
   *
   * @var array
   */
 protected $hidden = ['password'];
}
