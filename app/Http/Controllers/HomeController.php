<?php

namespace App\Http\Controllers;

use App\Information;
use Illuminate\Http\Request;

class HomeController extends Controller
{

   public function welcome()
   {
      $flights = Information::all();

      $data = [];

      foreach ($flights as $flight) {
         $data[$flight->tag_id] = $flight->information;
      }

      return view('welcome', $data);
   }
}
