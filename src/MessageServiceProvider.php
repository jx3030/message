<?php
namespace fglpk\message;

use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      //配置文件
      $this->publishes([
      	__DIR__.'/config/message.php' =>config_path('message.php'),
      ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       $message = new Message();
       $this->app->instance('fglpk\Message', $message);
    }
}