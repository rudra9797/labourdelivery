<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustoemerController extends Controller
{
    public function index()
    {
        $title = "select store";
        return view('customer.store', compact('title'));
    }
}
