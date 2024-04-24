<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\Booking; // Sesuaikan dengan model Anda

class LaporanController extends Controller
{
    public function generatePDF()
    {
        $peminjaman = Booking::all(); // Ambil semua data peminjaman
        $pdf = PDF::loadView('laporan.pdf', compact('booking')); // Load view PDF dan kirimkan data peminjaman

        return $pdf->download('laporan_peminjaman.pdf'); // Unduh file PDF dengan nama tertentu
    }
}
