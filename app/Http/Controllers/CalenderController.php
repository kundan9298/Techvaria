<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;
use App\Models\Candidate;
use App\Models\Department;


class CalenderController extends Controller
{
    public function index()
    {
        $data = Interview::all();
    
        $interviewTableData = [];
    
        foreach ($data as $interview) {
            $candidateID = $interview->candidate_name;
            $candidateDetails = Candidate::findorfail($candidateID);
            $departmentName = Department::findorfail($interview->job_name);
            $candidateName = $candidateDetails->name;
            // dd($departmentName);


              


    if ($interview->status === 'Completed') {
        $backgroundColor = '#2ecc71'; 
        $borderColor = '#2ecc71';
    } elseif ($interview->status === 'Cancelled') {
        $backgroundColor = '#e74c3c'; 
        $borderColor = '#e74c3c';
    }else{
        $backgroundColor = '#f1c40f';
        $borderColor = '#f1c40f';
    }

            $interviewTableData[] = [
                // 'id' => $interview->id,
                'title' => $departmentName->name.'-'.$candidateName, 
                'start' => $interview->date.'T'.$interview->time,
                // 'end' => $interview->time,
                'status' => $interview->status,
                // 'candidate' => $candidateName, 

                'backgroundColor' => $backgroundColor,
                'borderColor' => $borderColor,
            ];
        }

        // dd($interviewTableData);
    
        return view('calender', compact('interviewTableData'));
    }
    
    
}
