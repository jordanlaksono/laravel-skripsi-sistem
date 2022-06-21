<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="{{asset('AdminLTE')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <a href="/home" class="nav-link">Beranda</a>
          @if(auth()->user()->level == '3')
          <li class="nav-item">
            <a href="/dashboard/dashboardProfile" class="nav-link">Booking</a>
          </li>
          @elseif(auth()->user()->level == '2')
          <li class="nav-item">
            <a href="/dosen/calender/{{ Auth::user()->fc_kdusers }}" class="nav-link">Dosen</a>
          </li>
          <li class="nav-item">
            <a href="/dosen/booking/{{ Auth::user()->fc_kdusers }}" class="nav-link">Booking</a>
          </li>
          <li class="nav-item">
            <a href="/dosen/skripsi/{{ Auth::user()->fc_kdusers }}" class="nav-link">Skripsi</a>
          </li>
          @else
          <li class="nav-item">
            <a href="/mahasiswa" class="nav-link">Data Mahasiswa</a>
          </li>
          <li class="nav-item">
            <a href="/master_dosen" class="nav-link">Data Dosen</a>
          </li>
          @endif
        </ul>


      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">

                <a class="nav-link" data-toggle="dropdown" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">


                    <i class="fas fa-power-off"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

        </li>

      </ul>
    </div>
  </nav>
