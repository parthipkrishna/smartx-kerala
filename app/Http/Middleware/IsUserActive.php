<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IsUserActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {   $email = $request->email;
        $password = $request->password;
        $device_key = $request->device_key;
        $user = User::where('email',$email)->first();
        $password_check = $user ? Hash::check($password, $user->password) : false;
        if(!($user && $password_check)){
            return response()->json(['message' => 'Email or password is incorrect', 'status' => false]);
        }
        else if($password_check && $user->is_logined){
          if($user->device_token == $request->device_token){
            return $next($request);
          }else{
          return response()->json(['message' => 'This user already logined on another device.','user' => $user, 'is_user_active' => true , 'status' => true]);
          }
        }else if($password_check && !$user->is_logined && $user->device_token == null){
           return $next($request);   
        }
    }
}
