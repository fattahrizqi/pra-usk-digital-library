
@extends('layouts.main')

@section('main-content')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Category</h1>
        
        <nav aria-label="breadcrumb mb-0">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/category">Category</a></li>
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
                    <form action="/category" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama Kategori</label>
                          <input type="text" class="form-control" id="name" name="name" required>
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
                    <h6 class="m-0 font-weight-bold text-primary">Lists Category</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if (count($categories) > 0)
                        
                    @foreach ($categories as $category)
                    <div class="d-flex align-items-center py-1">
                        <i class="fa-regular fa-circle pl-3"></i>
                        <p class="my-0 pl-2">{{ $category->name }}</p>
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