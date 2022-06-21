<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="/dashboard/dashboardProfile/" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
          <p>
            Beranda
          </p>
        </a>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-copy"></i>
          <p>
            Times & Availability
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/bookings/availability/" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Availability</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/bookings/duration/" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Duration & Display</p>
            </a>
          </li>

        </ul>
      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon far fa-envelope"></i>
          <p>
            Notifications
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/bookings/notifikasi/" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Actions</p>
            </a>
          </li>


        </ul>
      </li>
       <li class="nav-item">
        <a href="/calender/index/{{Request::segment(3)}}" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
          <p>
            Live booking page
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/skripsi" class="nav-link">
            <i class="nav-icon fas fa-columns"></i>
          <p>
            Skripsi
          </p>
        </a>
      </li>
    </ul>
  </nav>
