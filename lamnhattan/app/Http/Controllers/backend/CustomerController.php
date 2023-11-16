<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Users;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $list = Customer::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        return view("backend.customer.index",compact("list"));
    }
}
