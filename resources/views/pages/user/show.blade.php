{{-- @extends('layouts.main')

@section('main-content')
<a href="/user">Kembali</a>
<h1>user Detail</h1>

    <table>
        <tr>
            <td>
                <span>Nama: </span>
                {{ $user->name }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Username: </span>
                {{ $user->username }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Role: </span>
                {{ $user->role }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Status: </span>
                {{ $user->status }}
            </td>
        </tr>
        <tr>
            <td>
                <a href="/user/{{ $user->id }}/edit">Edit</a>
            </td>
        </tr>
        <tr>
            <td>
                <form action="/user/{{ $user->id }}" method="post">
                @csrf
                @method('delete')
                <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    </table>
@endsection --}}


@extends('layouts.main')

@section('main-content')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail User</h1>
        
        <nav aria-label="breadcrumb mb-0">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/user">User</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                    <div class="d-flex gap-2">
                        <a href="/user/{{ $user->id }}/edit" class="btn btn-warning btn-sm btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>

                        <form action="/user/{{ $user->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-trash-can"></i>
                                </span>
                                <span class="text">Delete</span>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td class="w-50">
                                <span>Nama</span>
                            </td>
                            <td>
                                {{ $user->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Username</span>
                            </td>
                            <td>
                                {{ $user->username }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Role</span>
                            </td>
                            <td>
                                {{ $user->role }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Status</span>
                            </td>
                            <td>
                                {{ $user->status }}
                            </td>
                        </tr>
                    </table>
                    
                    
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