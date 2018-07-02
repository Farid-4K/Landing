<?php

namespace App\Providers;

use App\Admin\Admin;
use App\Config;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Markdown;
use Illuminate\Mail\TransportManager;
use Swift_Mailer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Swift_DependencyContainer;
use Illuminate\Support\ServiceProvider;

class MailServiceProvider extends ServiceProvider
{
   /**
    * Indicates if loading of the provider is deferred.
    *
    * @var bool
    */
   protected $defer = true;

   /**
    * Register the service provider.
    *
    * @return void
    */
   public function register()
   {
      $this->registerSwiftMailer();

      $this->registerIlluminateMailer();

      $this->registerMarkdownRenderer();
   }

   /**
    * Register the Illuminate mailer instance.
    *
    * @return void
    */
   protected function registerIlluminateMailer()
   {
      $this->app->singleton(
        'mailer', function ($app) {
         $config = $app->make('config')->get('mail');
         $config['driver'] = Config::query()->where('name', '=', 'MAIL_DRIVER');
         $config['host'] = Config::query()->where('name', '=', 'MAIL_HOST');
         $config['port'] = Config::query()->where('name', '=', 'MAIL_PORT');
         $config['username'] = Config::query()->where('name', '=', 'MAIL_USERNAME');
         $config['password'] = Config::query()->where('name', '=', 'MAIL_PASSWORD');
         $config['encryption'] = Config::query()->where('name', '=', 'MAIL_ENCRYPTION');

         $mailer = new Mailer(
           $app['view'], $app['swift.mailer'], $app['events']
         );

         if($app->bound('queue')) {
            $mailer->setQueue($app['queue']);
         }

         foreach (['from', 'reply_to', 'to'] as $type) {
            $this->setGlobalAddress($mailer, $config, $type);
         }

         return $mailer;
      });
   }

   /**
    * Set a global address on the mailer by type.
    *
    * @param  \Illuminate\Mail\Mailer $mailer
    * @param  array $config
    * @param  string $type
    *
    * @return void
    */
   protected function setGlobalAddress($mailer, array $config, $type)
   {
      $address = Arr::get($config, $type);

      if(is_array($address) && isset($address['address'])) {
         $mailer->{'always' . Str::studly($type)}($address['address'], $address['name']);
      }
   }

   /**
    * Register the Swift Mailer instance.
    *
    * @return void
    */
   public function registerSwiftMailer()
   {
      $this->registerSwiftTransport();

      // Once we have the transporter registered, we will register the actual Swift
      // mailer instance, passing in the transport instances, which allows us to
      // override this transporter instances during app start-up if necessary.
      $this->app->singleton(
        'swift.mailer', function ($app) {
         if($domain = $app->make('config')->get('mail.domain')) {
            Swift_DependencyContainer::getInstance()
                                     ->register('mime.idgenerator.idright')
                                     ->asValue($domain);
         }

         return new Swift_Mailer($app['swift.transport']->driver());
      });
   }

   /**
    * Register the Swift Transport instance.
    *
    * @return void
    */
   protected function registerSwiftTransport()
   {
      $this->app->singleton(
        'swift.transport', function ($app) {
         return new TransportManager($app);
      });
   }

   /**
    * Register the Markdown renderer instance.
    *
    * @return void
    */
   protected function registerMarkdownRenderer()
   {
      if($this->app->runningInConsole()) {
         $this->publishes(
           [
             __DIR__ . '/resources/views' => $this->app->resourcePath(
               'views/vendor/mail'),
           ], 'laravel-mail');
      }

      $this->app->singleton(
        Markdown::class, function ($app) {
         $config = $app->make('config');

         return new Markdown(
           $app->make('view'), [
           'theme' => $config->get('mail.markdown.theme', 'default'),
           'paths' => $config->get('mail.markdown.paths', []),
         ]);
      });
   }

   /**
    * Get the services provided by the provider.
    *
    * @return array
    */
   public function provides()
   {
      return [
        'mailer',
        'swift.mailer',
        'swift.transport',
        Markdown::class,
      ];
   }
}
