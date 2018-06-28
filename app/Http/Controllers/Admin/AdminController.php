<?php /** @noinspection PhpUndefinedClassInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Admin\Admin;

class AdminController extends Controller
{
   private $admin;

   public function __construct(Request $request)
   {
      /**
       * Protect  access to methods
       */
      $this->middleware('auth');
      $this->admin = Admin::query()->first();
   }

   /**
    * Sets new information about the administrator
    *
    * @param \Illuminate\Http\Request $request
    *
    * @return string
    */
   public function set(Request $request)
   {
      /**
       * Prepare
       */
      $validated = $request->validate(
        [
          'name'  => 'max:50',
          'login' => 'required|max:100',
          'email' => 'email',
        ]);

      /**
       * Set new settings
       */
      if($this->admin->fill($validated)) {
         return $this->admin->save()
           ? response('Сохранено', 200)
           : response('Ошибка', 500);
      }
   }

   public function setPassword(Request $request)
   {
      /**
       * Prepare
       */
      $validated = $request->validate(
        [
          'password' => 'required|max:100',
        ]);
      $data['password'] = Hash::make($validated['password']);

      /**
       * Update in database
       */
      if($this->admin->fill($data)) {
         return $this->admin->save()
           ? response('Сохранено', 200)
           : response('Ошибка', 500);
      }
   }

   public function showProfile(Request $request)
   {
      if($request->get('page') == 'settings') {

         $data = [
           'vk'    => $this->admin->vk,
           'name'  => $this->admin->name,
           'email' => $this->admin->email,
           'login' => $this->admin->login,
         ];

         return view('admin.settings', $data);
      }
   }

   public function untie()
   {
      $this->admin->vk = 0;
      $this->admin->save();

      return redirect('/admin');
   }
}
