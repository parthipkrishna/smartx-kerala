<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    public function index() {
        return view('dashboard.product.tax.tax-class.tax-class');
    }

    public function create()
    {
        return view('dashboard.product.tax.tax-class.add');
    } 

    public function store(Request $request)
    {
        // Code to save a new resource
    }

    public function show($id)
    {
        // Code to display a specific resource
    } 

    public function edit()
    {
        return view('dashboard.product.tax.tax-class.update');
    }   

    public function rateIndex() {
        return view('dashboard.product.tax.tax-rate.tax-rate');
    }

    public function rateCreate() {
        return view('dashboard.product.tax.tax-rate.add');
    }

    public function rateEdit() {
        return view('dashboard.product.tax.tax-rate.update');
    }
}
