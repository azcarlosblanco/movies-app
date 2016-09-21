<?php
namespace App\Components;

use Collective\Html\HtmlBuilder as CollectiveHtmlBuilder;
use TeachMe\Http\Kernel;
use Illuminate\Contracts\View\Factory as View;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Routing\UrlGenerator;

/**
 * HtmlBuilder
 */
class HtmlBuilder extends CollectiveHtmlBuilder
{

 /**
  * Factory instance
  *
  * @var \Illuminate\Routing\UrlGenerator
  */
  protected $view;

  /**
   * Repository instance
   *
   * @var Illuminate\Contracts\Config\Repository
   */
  protected $config;

  public function __construct(View $view, Config $config, UrlGenerator $url)
  {
    $this->view = $view;
    $this->config = $config;
    $this->url = $url;
  }

  public function menu($items)
  {
    if (! is_array($items)) {
      $items = $this->config->get($items, []);
    }

    return $this->view->make('partials.menu')->with('items', $items);
  }

  public function classes(array $classes)
  {
    $atributte = '';
    foreach ($classes as $name => $bool) {
      if (is_int($name)) {
        $name = $bool;
        $bool = true;
      }
      if ($bool) {
        $atributte .= $name . ' ';
      }
    }
    if ($atributte) {
      return ' class="'. $atributte .'"';
    }
     return '';
  }

}
