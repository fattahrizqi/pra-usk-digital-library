
@extends('layouts.main')

@section('main-content')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Book</h1>
        
        <nav aria-label="breadcrumb mb-0">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/book">Book</a></li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Book</h6>
                    <div class="d-flex gap-2">
                        <a href="/book/{{ $book->id }}/edit" class="btn btn-warning btn-sm btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </span>
                            <span class="text">Edit</span>
                        </a>

                        <form action="/book/{{ $book->id }}" method="post">
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
                                <span>Judul</span>
                            </td>
                            <td>
                                {{ $book->title }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Kategori</span>
                            </td>
                            <td>
                                {{ $book->category->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Pengarang</span>
                            </td>
                            <td>
                                {{ $book->author }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Penerbit</span>
                            </td>
                            <td>
                                {{ $book->publisher }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Stok Tersedia</span>
                            </td>
                            <td>
                                {{ $available_stock }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Stok Total</span>
                            </td>
                            <td>
                                {{ $total_stock }}
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
                    <h6 class="m-0 font-weight-bold text-primary">Rincian Detail [{{ $book->title }}]</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if (count($bookdetails) > 0)
                        
                    @foreach ($bookdetails as $bookdetail)
                    <div class="d-flex align-items-center py-1">
                        <i class="fa-regular fa-circle pl-3"></i>
                        <p class="my-0 pl-2">Detail Id : {{ $bookdetail->id }}</p>
                        <p class="badge {{ ($bookdetail->availability == 'available') ? 'text-bg-success' : 'text-bg-danger' }} my-0 ml-2">{{ $bookdetail->availability }}</p>
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