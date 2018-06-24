<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   protected $fillable
   = [
      'name',
      'email',
      'password',
      'login',
      'vk',
   ];

   protected $table = 'admin';
}
