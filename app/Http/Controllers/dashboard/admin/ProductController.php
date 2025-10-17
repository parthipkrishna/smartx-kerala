<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('dashboard.product.product.index');
    }

    public function create()
    {
        return view('dashboard.product.product.add');
    }  
    public function update () {
        return view('dashboard.product.product.update');
    } 
    public function store(Request $request)
    {
        // Code to save a new resource
    }   
    public function show()
    {
        return view('dashboard.product.product.details');
    }   
    public function edit($id)
    {
        // Code to show a form for editing a resource
    }   
}
