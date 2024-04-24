
@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
@endsection

@section('main-content')

@can('admin_librarian')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Book Title</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $book_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Category</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Member</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($members) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($bookings) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-bookmark fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow">
                
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Peminjaman Terbaru</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Judul buku</th>
                          <th>Peminjam</th>
                          <th>Admin</th>
                          <th>Tgl Pinjam</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($bookings as $booking)        
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{$booking->book->title}}</td>
                              <td>{{$booking->user->username}}</td>
                              <td>{{$booking->admin->username}}</td>
                              <td>{{$booking->created_at->format('d M Y')}}</td>
                              <td>{{isset($booking->tgl_kembali)? 'selesai' : 'dipinjam'}}</td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>

        {{-- all data --}}
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Member Terbaru</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if (count($members) > 0)
                        
                    @foreach ($members as $member)
                    <div class="d-flex align-items-center py-1">
                        <i class="fa-regular fa-circle pl-3"></i>
                        <p class="my-0 pl-2">{{ $member->name }}</p>
                    </div>
                    @endforeach
                    @else
                    <p class="my-0">Data Kosong</p>
                    @endif
                </div>
            </div>
        </div>

    </div>

</div>
@endcan

@can('member')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Book Title</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $book_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Category</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $category_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Member</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($members) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($bookings) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-bookmark fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col">
            <div class="card shadow">
                
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Peminjaman {{ auth()->user()->name }}</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Judul buku</th>
                          <th>Peminjam</th>
                          <th>Admin</th>
                          <th>Tgl Pinjam</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($booking_user as $booking)        
                          <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{$booking->book->title}}</td>
                              <td>{{$booking->user->username}}</td>
                              <td>{{$booking->admin->username}}</td>
                              <td>{{$booking->created_at->format('d M Y')}}</td>
                              <td>{{isset($booking->tgl_kembali)? 'selesai' : 'dipinjam'}}</td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
          </div>


    </div>

</div>
@endcan
    
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    
    <script>
        let table = new DataTable('#dataTable');
    </script>

@endsection