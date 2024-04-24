<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Booking;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        return view('index',[
            'bookings' => Booking::latest()->get(),
            'members' => User::where('role','member')->latest()->get(),
            'book_count' => count(Book::all()),
            'category_count' => count(Category::all()),
            'booking_user' => Booking::where('user_id', auth()->user()->id)->latest()->get(),
            
        ]);
    }
}
