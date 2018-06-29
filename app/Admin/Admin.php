<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
