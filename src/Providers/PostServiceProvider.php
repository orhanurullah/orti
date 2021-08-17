<?php
namespace Orti\Blogger\Providers;

use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../orti_config.php', 'orti_config.php');
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/../orti_config.php'
            => config_path('orti_config.php')
        ]);

        $this->loadRoutesFrom(__DIR__.'/../Routes/post_route.php');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views/Post', 'post');

        if ($this->app->runningInConsole())
        {
            if(! class_exists('CreatePostsTable'))
            {
                $this->publishes([
                    __DIR__.'/../Database/Migrations/create_posts_table.php.stub'
                    => database_path('migrations/'.date('Y_m_d_His', time()).'_create_posts_table.php')
                ], 'migrations');
            }
        }
    }
}