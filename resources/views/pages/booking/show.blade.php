{{-- @extends('layouts.main')

@section('main-content')
<a href="/bookinging">Kembali</a>
<h1>Bookinging Detail</h1>

    <table>
        <tr>
            <td>
                <span>Judul buku: </span>
                {{ $bookinging->booking->title }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Peminjam: </span>
                {{ $bookinging->user->username }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Admin: </span>
                {{ $bookinging->admin->username }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Status: </span>
                {{ isset($bookinging->tgl_kembali)? 'selesai' : 'dipinjam' }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Tanggal pinjam: </span>
                {{ $bookinging->created_at->format('d M Y') }}
            </td>
        </tr>
        <tr>
            <td>
                <span>Tanggal kembali: </span>
                {{ ($bookinging->tgl_kembali)? $bookinging->tgl_kembali : '-' }}
            </td>
        </tr>

        @if (!isset($bookinging->tgl_kembali))
            <tr>
                <td>
                    <span>aksi:</span>
                </td>
            </tr>
                
            <tr>
                <td>
                    <div class="row">
                        <form action="/booking/{{ $booking->id }}" method="post">
                            @csrf
                            @method('put')

                            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            <input type="hidden" name="bookingdetail_id" value="{{ $booking->bookingdetail->id }}">
                            <button type="submit">Peminjaman dikembalikan</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endif
    </table>
@endsection --}}


@extends('layouts.main')

@section('main-content')
<div class="container-fluid pt-4">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Booking</h1>
        
        <nav aria-label="breadcrumb mb-0">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item"><a href="/booking">Booking</a></li>
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
                    <h6 class="m-0 font-weight-bold text-primary">Data Booking</h6>
                    <div class="d-flex gap-2">
                        @if (!isset($booking->tgl_kembali))
                            <form action="/booking/{{ $booking->id }}" method="post">
                                @csrf
                                @method('put')

                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                <input type="hidden" name="bookdetail_id" value="{{ $booking->bookdetail->id }}">
                                <button type="submit"class="btn btn-warning btn-sm btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fa-solid fa-triangle-exclamation"></i>
                                    </span>
                                    <span class="text">Peminjaman belum dikembalikan</span>
                                </button>
                            </form>

                        @else
                            <button class="btn btn-success btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa-regular fa-circle-check"></i>
                                </span>
                                <span class="text">Peminjaman sudah dikembalikan</span>
                            </button>
                        @endif
{{--                         
                        <form action="/booking/{{ $booking->id }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fa-solid fa-trash-can"></i>
                                </span>
                                <span class="text">Delete</span>
                            </button>
                        </form> --}}
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td class="w-50">
                                <span>Judul buku</span>
                            </td>
                            <td>
                                {{ $booking->book->title }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Peminjam</span>
                            </td>
                            <td>
                                {{ $booking->user->username }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Admin</span>
                            </td>
                            <td>
                                {{ $booking->admin->username }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Status</span>
                            </td>
                            <td>
                                {{ isset($booking->tgl_kembali)? 'selesai' : 'dipinjam' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Tanggal pinjam</span>
                            </td>
                            <td>
                                {{ $booking->created_at->format('d M Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="w-50">
                                <span>Tanggal kembali</span>
                            </td>
                            <td>
                                {{ ($booking->tgl_kembali)? $booking->tgl_kembali : '-' }}
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