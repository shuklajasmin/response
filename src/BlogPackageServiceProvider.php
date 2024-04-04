<?php

namespace Shukaljasmin\Response;

use Illuminate\Support\ServiceProvider;
use Shukaljasmin\Response\ApiWarraper;

class BlogPackageServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind('ApiWarraper', function($app) {
        return new ApiWarraper();
    });
  }

  public function boot()
  {
    $this->app->bind('Calculator', function($app) {
        return new ApiWarraper();
    });
  }
}
