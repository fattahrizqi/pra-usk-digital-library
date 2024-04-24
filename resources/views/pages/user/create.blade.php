{{-- @extends('layouts.main')

@section('main-content')
    <h1>Create User</h1>
    <a href="/user">Kembali</a>

    <form action="/user" method="post">
        @csrf
        <div class="row">
            <label for="name">Nama: </label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="row">
            <label for="username">Username: </label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="row">
            <label for="password">Password: </label>
            <input type="text" id="password" name="password" required>
        </div>
        <div class="row">
            <label for="role">Role: </label>
            <input type="text" id="role" name="role" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection --}}


@extends('layouts.main')

@section('main-content')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create User</h1>
        
        <nav aria-label="breadcrumb mb-0">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/user">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
          </nav>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Form Create</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <form action="/user" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                          <label for="username" class="form-label">Username</label>
                          <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="text" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                          <label for="title" class="form-label">Role</label>
                          <select class="form-select" name="role" aria-label="Default select example">
                            <option value="member">Anggota</option>
                            <option value="librarian">Pustakawan</option>
                            <option value="admin">Admin</option>
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                      </form>    
                </div>
            </div>
        </div>

        {{-- all data --}}
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Lists Users</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if (count($users) > 0)
                        
                    @foreach ($users as $user)
                    <div class="d-flex align-items-center py-1">
                        <i class="fa-regular fa-circle pl-3"></i>
                        <p class="my-0 pl-2">{{ $user->name }}</p>
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
    
@endsection