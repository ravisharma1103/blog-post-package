<?php

namespace MyVendor\BlogPost;

use Illuminate\Support\ServiceProvider;

class BlogPostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register package services and bindings here
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load routes, views, migrations, etc.
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'blogpost');
        $this->publishes([
            __DIR__.'/config/blogpost.php' => config_path('blogpost.php'),
        ]);
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'blogpost');
        // $this->publishes([
        //     __DIR__.'/../config/blogpost.php' => config_path('blogpost.php'),
        // ]);
    }
}
