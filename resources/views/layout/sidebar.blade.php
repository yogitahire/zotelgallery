<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo"><img src={{ asset('assets/images/zotel.png')}} alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" href="../../index.html"><img src={{ asset('assets/images/logo-mini.svg')}} alt="logo" /></a>
    </div>
    <ul class="nav">
      <li class="nav-item account-dropdown">
        <a class="nav-link" data-toggle="collapse" href="#account-dropdown" aria-expanded="false" aria-controls="account-dropdown">
          <img class="img-xs rounded-circle" src={{ asset('assets/images/faces-clipart/pic-1.png')}} alt="">
          <p class="mb-0 text-light">Yogita Hiray</p>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="account-dropdown">
          <ul class="nav flex-column sub-menu pl-0">
            <li class="nav-item">
              <a class="nav-link pl-5" href="#">
                <span class="menu-icon">
                  <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-5" href="#">
                <span class="menu-icon">
                  <i class="mdi mdi-power"></i>
                </span>
                <span class="menu-title">Logout</span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item nav-category">
        <span class="nav-link">Navigation</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href={{ route('gallery.index') }}>
          <span class="menu-icon">
            <i class="mdi mdi-grid"></i>
          </span>
          <span class="menu-title">Image Gallery</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href={{ route('gallery.create') }}>
          <span class="menu-icon">
            <i class="mdi mdi-grid"></i>
          </span>
          <span class="menu-title">Add Images</span>
        </a>
      </li>


    </ul>
  </nav>
