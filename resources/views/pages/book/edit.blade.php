@extends('layouts.main')

@section('main-content')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Book</h1>
        
        <nav aria-label="breadcrumb mb-0">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/book">Book</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Form Edit</h6>
                </div>

                <!-- Card Body -->
                <div class="card-body">

                    <form action="/book/{{ $book->id }}" method="post">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                          <label for="title" class="form-label">Judul Buku</label>
                          <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="title" class="form-label">Kategori</label>
                          <select class="form-select" name="category_id" aria-label="Default select example">
                            @foreach ($categories as $category)
                            @if($category->id == $book->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endif
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="author" class="form-label">Pengarang</label>
                          <input type="text" class="form-control" id="author" name="author" value="{{ $book->author }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="publisher" class="form-label">Penerbit</label>
                          <input type="text" class="form-control" id="publisher" name="publisher" value="{{ $book->publisher }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="stock" class="form-label">Stok</label>
                          <input type="number" class="form-control" id="stock" name="stock" value="{{ $total_stock }}" required>
                        </div>
                        <div class="mb-3">
                          <label for="description" class="form-label">Deskripsi</label>
                          <textarea class="form-control" name="description" id="description">{{ $book->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
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
                    <h6 class="m-0 font-weight-bold text-primary">Lists Books</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if (count($books) > 0)
                        
                    @foreach ($books as $book)
                    <div class="d-flex align-items-center py-1">
                        <i class="fa-regular fa-circle pl-3"></i>
                        <p class="my-0 pl-2">{{ $book->title }}</p>
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