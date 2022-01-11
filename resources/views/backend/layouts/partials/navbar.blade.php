<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      @php
          $locale = session()->get('locale')??'en';
      @endphp
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-{{ $locale == 'en' ? 'us' : 'al' }}"> </span> {{ $locale == 'en' ? 'English' : 'Albanian' }}</a>
        <div class="dropdown-menu" aria-labelledby="dropdown09">
            <a class="dropdown-item" href="{{ url('lang/al') }}"><span class="flag-icon flag-icon-al"> </span>  Albania</a>
            <a class="dropdown-item" href="{{ url('lang/en') }}"><span class="flag-icon flag-icon-us"> </span>  English</a>
        </div>
    </li>
   
    </ul>
    </ul>
  </nav>

  

