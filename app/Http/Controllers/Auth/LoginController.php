<?php

namespace App\Http\Controllers\Auth;

use App\Admin\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;
use Tests\Unit\adminControllerTest;

class LoginController extends Controller
{
   use AuthenticatesUsers;

   /*
   |--------------------------------------------------------------------------
   | Login Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles authenticating users for the application and
   | redirecting them to your home screen. The controller uses a trait
   | to conveniently provide its functionality to your applications.
   |
    */

   protected $redirectAfterLogout = '/';

   /**
    * Where to redirect users after login.
    *
    * @var string
    */
   protected $redirectTo = '/admin';

   /**
    * Create a new controller instance.
    *
    * @return void
    */
   public function __construct()
   {
      $this->middleware('guest')->except([
         'logout',
         'redirectToProvider',
         'handleProviderCallback',
      ]);
   }

   public function handleProviderCallback(Request $request)
   {
      $user = Socialite::driver('vkontakte')->user();
      $admin = Admin::query()->first();
      if (!Auth::guest()) {
         $admin->vk = $user->getId();
         $admin->save();
         Auth::loginUsingId($admin->id, true);
         return redirect('/admin');
      }
      if ($admin->vk == $user->getId()) {
         Auth::loginUsingId($admin->id, true);
         return redirect('/admin');
      }
   }

   public function redirectToProvider()
   {
      return Socialite::driver('vkontakte')->redirect();
   }

   public function showLoginForm()
   {
      $vk = Admin::query()->first()->vk;
      $data = [
         'vk' => $vk,
      ];
      return view('auth.login', $data);
   }

   public function username()
   {
      return 'login';
   }
}
