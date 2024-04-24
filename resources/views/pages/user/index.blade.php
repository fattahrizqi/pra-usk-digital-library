
@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.0/css/dataTables.dataTables.min.css">
@endsection

@section('main-content')

<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User</h1>
        <a href="/user/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-circle-plus"></i> Create New User</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lists Users</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>role</th>
                <th>status</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)        
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->status }}</td>
                    <td class="d-flex gap-1">
                        <a class="btn-circle btn-sm btn-info" href="/user/{{ $user->id }}"><i class="fa-solid fa-eye"></i></a>
                        <form action="/user/{{ $user->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn-circle btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                        </form>
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