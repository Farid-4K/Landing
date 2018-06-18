<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

   public function __construct(Request $request)
   {
      $this->middleware('auth');
   }

   public function profile(Request $request)
   {
      if ($request->get('page') == 'setting') {

         $vk = Admin::query()->find(1);
         $vk = $vk->vk;
         $data = [
           'vk' => $vk,
         ];

         return view('admin.settings', $data);
      }
   }

   public function logout(Request $request)
   {

      $db = Admin::query()->find(1);
      $db->vk = 0;
      $db->save();
      return redirect('/admin');

   }

   public function documentation()
   {
      return view('admin.makeup_rules');
   }


   public function editAdminInformation(Request $request)
   {
      $id = $request->get('id');

      $validated = $request->validate([
        'name'     => '',
        'login'    => 'required|max:100',
        'password' => 'required|max:100',
        'email'    => 'email',
      ]);

      $row = Admin::query()->find(1);

      if ($row->fill([
        'name'     => $validated['name'] ?: 'admin',
        'login'    => $validated['login'],
        'email'    => $validated['email'],
        'password' => Hash::make($validated['password']),
      ])
      ) {
         if ($row->save()) {
            return response('Сохранено');
         };
      } else {
         return response('ERROR', 500);
      }
   }
}
