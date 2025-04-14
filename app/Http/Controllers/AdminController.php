<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function index(){
        return view('login');
    }

    public function login(Request $request){
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $admin = Admin::where('email', $request->email)->first();    
        if ($admin && Hash::check($request->password, $admin->password)) {

            session(['name' => $admin->name, 'admin_id' => $admin->id]);
            
            return redirect()->route('admin.dashboard')->with('success', 'Logged in successfully');
        } else {
            return back()->with('error', 'Invalid email or password');
        }
}
}