<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index() {
        return view('dashboard.product.brand.index');
    }   

    public function create() {
        return view('dashboard.product.brand.add');
    }  
    
    public function update() {
        return view('dashboard.product.brand.update');
    }

    public function store(Request $request)
    {
        // Code to save a new resource
    }   

    public function show($id)
    {
        // Code to display a specific resource
    }   

    public function edit($id)
    {
        // Code to show a form for editing a resource
    }   

    public function destroy($id)
    {
        // Code to delete a specific resource
    }

}
