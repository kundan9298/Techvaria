<?php

namespace App\Http\Controllers;

use App\Models\HR;
use Illuminate\Http\Request;


class HRController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HR::orderBy('id', 'desc')->get();

        // print_r($data);
        return view('hr',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'dob' => 'required',
            'gender' => 'required|string',
            'city' => 'required|string|max:100',
        ]);
    
        $data = new HR;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->city = $request->city;
    
        // Save to database
        $data->save();
    
        // Optional: Redirect or return success response
        return redirect()->back()->with('success', 'HR record added successfully!');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'dob' => 'required',
            'gender' => 'required|string',
            'city' => 'required|string|max:100',
        ]);
    
        $data = HR::findOrFail($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        $data->gender = $request->gender;
        $data->city = $request->city;

        $data->save();
        return redirect()->back()->with('success', 'HR record Update successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function delete(Request $request, $id)
    {
        $data = $data = HR::findOrFail($id);

        $data->delete();
        return redirect()->back()->with('success', 'HR record deleted successfully!');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        echo $id;
        $data = HR::find($id);

        // dd($data);

        return view('hradd', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
 

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cr $cr)
    {
        //
    }
}
