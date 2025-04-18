<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\HR;
use App\Models\Candidate;
use App\Models\Department;


class InterviewController extends Controller
{
    public function index()
    {
        $data = Interview::orderBy('id', 'desc')->get();
        $departmentData = Department::select('name', 'id')->get();
        // dd($departmentData);

        $candidateData = Candidate::select('name','id')->get();
        $hrData = HR::select('name','id')->get();
        return view('Interview',compact('data','hrData','candidateData', 'departmentData'));
    }


    public function add(Request $request)
    {

        $request->validate([
            'job_name' => 'required|string|max:255',
            'candidate_name' => 'required|string|max:255',
            'assigned_to' => 'required|string',
            'place' => 'required|string',
            'date' => 'required|string',
            'time' => 'required | string',

        ]);

        // dd($request);
    
        $data = new Interview;
        $data->job_name = $request->job_name;
        $data->candidate_name = $request->candidate_name;
        $data->assigned_to_hr = $request->assigned_to;
        $data->place = $request->place;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->remainder = $request->reminder_type;
    
        $data->save();
    
        return redirect()->back()->with('success', 'Interview record added successfully!');

    }


    public function addForm(){
        $hrData = HR::select('name','id')->get();
        $candidateData = Candidate::select('name','id')->get();
        $departmentData = Department::select('name','id')->get();

       
        
        return view('interviewadd', compact('hrData','candidateData','departmentData'));
        
    }

    public function edit(Request $request, $id)
    {
        
        $data = Interview::find($id);
        // dd($data);
        $departmentData = Department::select('name','id')->get();
       $candidateData = Candidate::select('name','id')->get();
        $hrData = HR::select('name','id')->get();
       

        return view('interviewadd', compact('data','hrData','candidateData','departmentData'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'job_name' => 'required|string|max:255',
            'candidate_name' => 'required|string|max:255',
            'assigned_to' => 'required|string',
            'place' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
        ]);
    
        $data = Interview::findOrFail($id);

        
    
        $data->job_name = $request->job_name;
        $data->candidate_name = $request->candidate_name;
        $data->assigned_to_hr = $request->assigned_to;
        $data->place = $request->place;
        $data->date = $request->date;
        $data->time = $request->time;
        $data->remainder = $request->reminder_type;
    
        $data->save();
    
        return redirect()->back()->with('success', 'Interview record updated successfully!');
    }


    public function updateStatus(Request $request)
{
    $id = $request->id;
    $name = $request->name;
    
    $interview = Interview::findOrFail($id);

    $interview->$name = $request->status; // Update the correct column with the new value

    $interview->save();

    return response()->json(['message' => 'Status updated successfully']);
}


}
