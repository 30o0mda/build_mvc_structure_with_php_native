  <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="{{url(ADMIN.'lang?lang=ar')}}">
      <h2><?php echo trans('main.Home Page') ?></h2>
    </a>

    <ul class="nav nav-pills">
      <?php if (session('locale') == 'ar'): ?>
        <li class="nav-item"><a href="{{ url(ADMIN.'/lang?lang=en') }}" class="nav-link">ENGLISH</a></li>
      <?php else: ?>
        <li class="nav-item"><a href="{{ url(ADMIN.'/lang?lang=ar') }}" class="nav-link">عربي</a></li>
      <?php endif; ?>
    </ul>
  </header>