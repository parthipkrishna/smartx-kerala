<?php
namespace App\Http\Controllers\dashboard\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        return view('dashboard.order.order');
    }

    public function placedOrder() {
        return view('dashboard.order.placed-order');
    }

    public function processedOrder() {
        return view('dashboard.order.processed-order');
    }

    public function canceledOrder() {
        return view('dashboard.order.canceled-order');
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
        return view('dashboard.order.detail');
    }  

    public function edit($id)
    {
        // Code to show a form for editing a resource
    }   
}