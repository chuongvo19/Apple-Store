<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function showContact()
    {
        $categories = Category::all();
        return view('frontend.contact.contact', compact('categories'));
    }
}
