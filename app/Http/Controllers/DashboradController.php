<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HR;
use App\Models\Candidate;
use App\Models\Interview;

class DashboradController extends Controller
{
    
    public function index(){
        $totalHR = HR::count();
        $totalCandidate = Candidate::count();
        $totalInterview = Interview::count();
        $AttendCount = Interview::where('status', 'Completed')->count();

        // dd($completedCount);
        
        return view('dashboard', compact('totalHR','totalCandidate','totalInterview','AttendCount'));
    }
}
