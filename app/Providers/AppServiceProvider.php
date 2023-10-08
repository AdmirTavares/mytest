<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Component;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Component::macro('modal_s',function($title, $text){

            $this->js(<<<JS
            Swal.fire(
              '{$title}',
              '{$text}',
              'success'
            );
            
            JS); 

        });
        Component::macro('modal_w',function($title, $text){

            $this->js(<<<JS
            Swal.fire(
              '{$title}',
              '{$text}',
              'warning'
            );
            
            JS); 

        });
    }
}
