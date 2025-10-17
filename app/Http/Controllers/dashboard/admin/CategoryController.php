<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('dashboard.product.category.category.show');
    }

    public function addIndex() {
        return view('dashboard.product.category.category.add');
    }
    public function editIndex() {
        return view('dashboard.product.category.category.update');
    }

    public function subIndex() {
        return view('dashboard.product.category.subcategory.index');
    }

    public function addSubIndex() {
        return view('dashboard.product.category.subcategory.add');
    }

    public function editSubIndex() {
        return view('dashboard.product.category.subcategory.update');
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
