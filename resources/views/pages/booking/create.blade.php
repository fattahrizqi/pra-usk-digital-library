{{-- @extends('layouts.main')

@section('main-content')
    <h1>Create Booking</h1>
    <a href="/booking">Kembali</a>

    <form action="/booking" method="post">
        @csrf
        <div class="row">
            <label for="book_id">Book: </label>
            <input type="text" id="book_id" name="book_id" required>
        </div>
        <div class="row">
            <label for="user_id">Anggota: </label>
            <input type="text" id="user_id" name="user_id" required>
        </div>
        <button type="submit">Create</button>
    </form>
@endsection --}}


@extends('layouts.main')

@section('main-content')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Entry Booking</h1>
        
        <nav aria-label="breadcrumb mb-0">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/booking">Booking</a></li>
              <li class="breadcrumb-item active" aria-current="page">Entry</li>
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

                    <form action="/booking" method="post">
                        @csrf
                        <div class="mb-3">
                          <label for="book_id" class="form-label">Buku</label>
                          <select class="form-select" name="book_id" aria-label="Default select example">
                            @foreach ($books as $book)
                            <option value="{{ $book->id }}">{{ $book->title }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="user_id" class="form-label">Peminjam</label>
                          <select class="form-select" name="user_id" aria-label="Default select example">
                            @foreach ($members as $member)
                            <option value="{{ $member->id }}">{{ $member->username }}</option>
                            @endforeach
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
                    <h6 class="m-0 font-weight-bold text-primary">Lists Bookings</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @if (count($bookings) > 0)
                        
                    @foreach ($bookings as $booking)
                    <div class="d-flex align-items-center gap-2 py-1">
                        <i class="fa-regular fa-circle pl-2"></i>
                        <p class="my-0 pl-2">Id <br>[{{ $booking->id }}]</p>
                        <p class="my-0 pl-2">Buku <br>[{{ $booking->book->title }}]</p>
                        <p class="my-0 pl-2">Peminjam <br>[{{ $booking->user->username }}]</p>
                        <p class="badge {{ ($booking->tgl_kembali !== null) ? 'text-bg-success' : 'text-bg-danger' }} my-0 ml-2">{{ ($booking->tgl_kembali !== null) ? 'selesai' : 'dipinjam' }}</p>
                    </div>
                    <hr>
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