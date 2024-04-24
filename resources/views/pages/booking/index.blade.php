
@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
@endsection

@section('main-content')

<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Booking</h1>
        <a href="/booking/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-circle-plus"></i> Entry New Booking</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header d-flex justify-content-between py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lists Bookings</h6>
        <a href="/laporan-peminjaman" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Export to PDF</a>
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
                <th>Aksi</th>
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
                    <td class="d-flex gap-1">
                        <a class="btn-circle btn-sm btn-info" href="/booking/{{ $booking->id }}"><i class="fa-solid fa-eye"></i></a>
                        {{-- <form action="/booking/{{ $booking->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-circle btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
    
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="//cdn.datatables.net/2.0.0/js/dataTables.min.js"></script>
    
    <script>
        let table = new DataTable('#dataTable');
    </script>

@endsection