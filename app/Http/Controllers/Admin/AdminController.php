<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
   public function __construct(Request $request)
   {
      /**
       * Protect  access to methods
       */
      $this->middleware('auth');
   }

   public function showProfile(Request $request)
   {
      if($request->get('page') == 'setting') {
         $admin = Admin::query()->find(1);

         $data = [
           'vk'    => $admin->vk,
           'name'  => $admin->name,
           'email' => $admin->email,
           'login' => $admin->login,
         ];

         return view('admin.settings', $data);
      }
   }

   public function untie(Request $request)
   {
      $db = Admin::query()->find(1);
      $db->vk = 0;
      $db->save();
      return redirect('/admin');
   }

   public function set(Request $request)
   {
      $id = $request->get('id');

      $validated = $request->validate(
        [
          'name'     => '',
          'login'    => 'required|max:100',
          'password' => 'required|max:100',
          'email'    => 'email',
        ]);

      $row = Admin::query()->find(1);

      if($row->fill(
        [
          'name'     => $validated['name'] ?: 'admin',
          'login'    => $validated['login'],
          'email'    => $validated['email'],
          'password' => Hash::make($validated['password']),
        ])
      ) {
         return $row->save() ? response('Сохранено') : response('Ошибка', 500);
      }
   }
}
