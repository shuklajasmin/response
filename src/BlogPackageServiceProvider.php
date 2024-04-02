<?php

namespace shukaljasmin\response;

use Illuminate\Support\ServiceProvider;

class BlogPackageServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind('Calculator', function($app) {
        return new Calculator();
    });
  }

  public function boot()
  {
    $this->app->bind('Calculator', function($app) {
        return new Calculator();
    });
  }
}
