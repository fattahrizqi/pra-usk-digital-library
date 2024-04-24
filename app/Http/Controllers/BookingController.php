<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Book;
use App\Models\User;
use App\Models\BookDetail;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.booking.index', [
            'bookings' => Booking::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.booking.create', [
            'books' => Book::all(),
            'members' => User::where('role', 'member')->get(),
            'bookings' => Booking::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'book_id' => 'required',
        ]);

        $validatedData['admin_id'] = Auth()->user()->id;

        $bookdetail_id = BookDetail::where('book_id', $request['book_id'])->where('availability', 'available')->first()->id;

        $validatedData['bookdetail_id'] = $bookdetail_id;

        Booking::create($validatedData);

        BookDetail::where('book_id', $request['book_id'])->where('availability', 'available')->first()->update(array('availability' => 'unavailable'));

        return redirect('/booking');
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        return view('pages.booking.show', [
            'bookings' => Booking::all(),
            'booking' => $booking,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookingRequest $request, Booking $booking)
    {
        $booking = Booking::where('id', $request['booking_id']);

        $booking->update(array('tgl_kembali' => now()));

        BookDetail::where('id', $request['bookdetail_id'])->where('availability', 'unavailable')->first()->update(array('availability' => 'available'));

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function generatePDF()
    {
        $pdf = Pdf::loadView('pages.laporan.pdf', [
            'bookings' => Booking::all(),
        ]);

        return $pdf->download('laporan_peminjaman.pdf'); // Unduh file PDF dengan nama tertentu
    }
}
