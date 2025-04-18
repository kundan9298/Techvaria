<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HR;
use App\Models\Candidate;
use App\Models\Interview;
use App\Models\Department;
use DB;

class DashboradController extends Controller
{
    
    public function index()
{
    $totalHR = HR::count();
    $totalCandidate = Candidate::count();
    $totalInterview = Interview::count();
    $completeInterview = Interview::where('status', 'Completed')->count();
    // dd($completeInterview);
    $AttendCount = DB::table('interview')
    ->select('job_name', DB::raw('COUNT(*) as total'))
    ->where('status', 'Completed')
    ->groupBy('job_name')
    
    ->get();

    $jobStats = DB::table('interview')
    ->select(
        'job_name',
        DB::raw("COUNT(CASE WHEN screening = 1 THEN 1 END) as screening_count"),
        DB::raw("COUNT(CASE WHEN submission = 1 THEN 1 END) as submission_count"),
        // DB::raw("COUNT(CASE WHEN interview = 1 THEN 1 END) as interview_count"),
        DB::raw("COUNT(CASE WHEN offered = 1 THEN 1 END) as offered_count"),
        DB::raw("COUNT(CASE WHEN hire = 1 THEN 1 END) as hire_count")
        // DB::raw("COUNT(CASE WHEN others = 1 THEN 1 END) as other_count")
    )
    ->where('status', 'Completed') // ✅ This is your added condition
    ->groupBy('job_name')
    ->get();

    $departmentName = Department::all();

    return view('dashboard', compact(
        'totalHR',
        'totalCandidate',
        'totalInterview',
        'AttendCount',
        'jobStats',
        'departmentName',
        'completeInterview'
    ));
}

}
