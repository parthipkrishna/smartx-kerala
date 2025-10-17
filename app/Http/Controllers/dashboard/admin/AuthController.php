<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
class AuthController extends Controller
{
    public function loginPage() {
        if (Auth::check()) {
            return redirect('/app-dashboard'); 
        }
        return view('auth.login');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->has('remember'); // Check if "Remember Me" is checked
        $user = User::where('email', $email)->first();
        if ($user) {
            if ($user->user_role == 1 || $user->user_role == 2) {
                if (Hash::check($password, $user->password)) {
                    Auth::login($user, $remember); // This enables "Remember Me"
                    return redirect('/app-dashboard');
                } else {
                    return redirect()->back()->withErrors(['message' => 'Password is incorrect'])->withInput();
                }
            } else {
                return redirect()->back()->withErrors(['message' => 'Permission Denied'])->withInput();
            }
        } else {
            return redirect()->back()->withErrors(['message' => 'Invalid credentials. Please check your email and password.'])->withInput();
        }
    }
     
    public function dashboard() {
        if(!auth()->user()){
            return redirect()->intended('/admin');
        }
        else if(auth()->user()->user_role === 2 || auth()->user()->user_role === 3){
            return redirect('/users');
        }
    }

    public function Signup() {
        return view('auth.signup');
    }

    public function logout(){
        $logout = Auth::logout();
        return redirect()->intended('/admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
