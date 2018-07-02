<?php

namespace App\Mail;

use App\Admin\Admin;
use App\Admin\Information;
use App\Admin\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
   use Queueable, SerializesModels;
   /**
    * @var string - Почта адменистратора
    */
   static $email;
   static $target;
   static $all;

   /**
    * Create a new message instance.
    *
    * @param $about
    */
   public function __construct($about)
   {
      self::$email = $about['email'];
      self::$all = $about;
      self::$target = Admin::query()->first()->email;
   }

   /**
    * Build the message.
    *
    * @param $about
    *
    * @return $this
    */
   public function build()
   {
      foreach (self::$all as $key => $val) {
         $data[$key] = $val;
      }

      $data['userMessage'] = $data['message']??null;

      return $this->to(self::$target)
                  ->view('mail.order', $data??null);
   }
}
