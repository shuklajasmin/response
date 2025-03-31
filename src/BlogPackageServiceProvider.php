<?php

namespace Shukaljasmin\Response;

use Illuminate\Support\ServiceProvider;
use Shukaljasmin\Response\ApiWarper;

class BlogPackageServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind('ApiWarper', function($app) {
        return new ApiWarper();
    });
  }

  public function boot()
  {
    $this->app->bind('ApiWarper', function($app) {
        return new ApiWarper();
    });
  }
}
