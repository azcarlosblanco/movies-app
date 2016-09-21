<ul class="nav navbar-nav">
  @foreach ($items as $route => $title)
    <li {!! Html::classes(['active' => Route::is($route)]) !!}>
      <a href="{{ route($route) }}">{{ $title }}</a>
    </li>
  @endforeach
</ul>
