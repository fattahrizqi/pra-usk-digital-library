<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fa-solid fa-book-open"></i>
      </div>
      <div class="sidebar-brand-text mx-3">PRAUSK</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item {{ (Request::is('/')) ? 'active' : '' }}">
      <a class="nav-link" href="/">
          <i class="fa-solid fa-table-columns"></i>
          <span>Dashboard</span></a>
  </li>

  @can('admin_librarian')
  <!-- Divider -->
  <hr class="sidebar-divider">
  
  <!-- Heading -->
  <div class="sidebar-heading">
      Pages
  </div>
  @endcan

  @can('admin')
      
  <!-- Nav Item - Category -->
  <li class="nav-item {{ (Request::is('category*')) ? 'active' : '' }}">
    <a class="nav-link" href="/category">
      <i class="fa-solid fa-list"></i>
      <span>Category</span></a>
    </li>
    
    <!-- Nav Item - Book -->
    <li class="nav-item {{ (Request::is('book') || Request::is('book/*')) ? 'active' : '' }}">
      <a class="nav-link" href="/book">
        <i class="fa-solid fa-book"></i>
        <span>Book</span></a>
      </li>
      
      <!-- Nav Item - User -->
      <li class="nav-item {{ (Request::is('user*')) ? 'active' : '' }}">
        <a class="nav-link" href="/user">
          <i class="fa-solid fa-user"></i>
          <span>User</span></a>
        </li>
  @endcan
        

  @can('admin_librarian')
        <!-- Nav Item - Booking -->
  <li class="nav-item {{ (Request::is('booking*')) ? 'active' : '' }}">
      <a class="nav-link" href="/booking">
          <i class="fa-solid fa-bookmark"></i>
          <span>Booking</span></a>
  </li>
  @endcan
  
  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
      Account
  </div>

  <!-- Nav Item - Category -->
  <li class="nav-item">
      <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
          <i class="fa-solid fa-right-from-bracket"></i>
          <span>Logout</span></a>
  </li>


  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>