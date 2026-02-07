<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      
      <span class="brand-text font-weight-light">{{ Auth::check() ? Auth::user()->role->name : '-'}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <a href="{{route('get.profile')}}"><div class="image">
     @if(Auth::check() && Auth::user()->image)
          <img src="{{ asset('storage/photos/'.Auth::user()->image)}}" class="img-circle elevation-2" alt="User Image">
        @else
                    <img src="{{ asset('assets/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"></a> 
                 @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::check() ? Auth::user()->name : '-'}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      
</div>
</aside>