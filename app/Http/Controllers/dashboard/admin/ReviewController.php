<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index() {
        return view('dashboard.product.review.index');
    }
    public function create()
    {
        // Code to show a form for creating a new resource
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
}
