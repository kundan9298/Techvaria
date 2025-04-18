<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interview;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function index(){

        $totalInterview = Interview::count();
        // dd($data);
        $totalComplete = Interview::where('status', 'completed')->count();
        $totalCancelled = Interview::where('status', 'cancelled')->count();
        $totalPending = Interview::where('status', 'pending')->count();
        // dd($totalComplete, $totalCancelled, $totalPending);

        $currentData = Interview::whereBetween('created_at',[Carbon::now()->startofWeek(),Carbon::now()->endofWeek()])->get();
        // dd($currentData);

        

        

$todayData = Interview::whereDate('created_at', Carbon::today())->get();
$weekData = Interview::whereBetween('created_at', [
    Carbon::now()->startOfWeek(), 
    Carbon::now()->endOfWeek()
])->get();


$monthData = Interview::whereMonth('created_at', Carbon::now()->month)
                      ->whereYear('created_at', Carbon::now()->year)
                      ->get();

                      $pendingInterviewsInMonth = $monthData->filter(function ($item) {
                        return strtolower($item->status) === 'pending';
                    });
                    

                    //   dd($pendingInterviewsInMonth);

                      $yearData = Interview::whereYear('created_at', Carbon::now()->year)->get();

        

        return view('report', compact('totalInterview','totalComplete','totalCancelled','totalPending'));
    }



    public function filtter(Request $request)
    {
        $query = Interview::query();

        // dd($query);
    
        if ($request->filter_type == 'day') {
            $query->whereDate('created_at', Carbon::today());
        } elseif ($request->filter_type == 'week') {
            $query->whereBetween('created_at', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]);
        } elseif ($request->filter_type == 'month') {
            $query->whereMonth('created_at', Carbon::now()->month);
        } elseif ($request->filter_type == 'year') {
            $query->whereYear('created_at', Carbon::now()->year);
        }
    
        if ($request->from_date && $request->to_date) {
            $query->whereBetween('created_at', [
                Carbon::parse($request->from_date)->startOfDay(),
                Carbon::parse($request->to_date)->endOfDay()
            ]);
        }

    
        $data = $query->get();
    
        return view('report', [
            'totalData'      => $data->count(),
            'totalPending'   => $data->where('status', 'Pending')->count(),
            'totalComplete'  => $data->where('status', 'Completed')->count(),
            'totalCancelled' => $data->where('status', 'Cancelled')->count()
        ]);
    }
    
}
