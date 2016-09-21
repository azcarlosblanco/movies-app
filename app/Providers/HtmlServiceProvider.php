<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\HtmlServiceProvider as CollectiveHtmlServiceProvider;
use App\Components\HtmlBuilder;

class HtmlServiceProvider extends CollectiveHtmlServiceProvider {


	/**
	 * Register the HTML builder instance.
	 *
	 * @return void
	 */
	protected function registerHtmlBuilder()
	{
		$this->app->bindShared('html', function($app)
		{
			return new HtmlBuilder($app['view'], $app['config'], $app['url']);
		});
	}


}
