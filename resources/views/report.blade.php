@extends('template')

@section('content')
<div class="container-fluid">
    <h4 class="page-title">Interview Report</h4>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Filter Form --}}
    <form action="{{ url('report/filtter') }}" method="post" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <label for="filter_type">Quick Filter</label>
                <select name="filter_type" id="filter_type" class="form-control">
                    <option value="">Select</option>
                    <option value="day">Today</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="year">This Year</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="from_date">From Date</label>
                <input type="date" name="from_date" id="from_date" class="form-control">
            </div>

            <div class="col-md-3">
                <label for="to_date">To Date</label>
                <input type="date" name="to_date" id="to_date" class="form-control">
            </div>

            <div class="col-md-3 mt-4 pt-2">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

    {{-- Dashboard Cards --}}
    <div class="container-fluid">
        <h4 class="page-title">Dashboard</h4>
        <div class="row">

            <div class="col-md-3">
                <div class="card card-stats card-primary">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-users"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Total Interview</p>
                                    <h4 class="card-title">{{ isset($totalData) ? $totalData : $totalInterview }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stats card-success">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-check-circle"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Completed</p>
                                    <h4 class="card-title">{{ isset($totalComplete) ? $totalComplete : 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stats card-warning">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-clock"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Pending</p>
                                    <h4 class="card-title">{{ isset($totalPending) ? $totalPending : 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card card-stats card-danger">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="la la-times-circle"></i>
                                </div>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <div class="numbers">
                                    <p class="card-category">Cancelled</p>
                                    <h4 class="card-title">{{ isset($totalCancelled) ? $totalCancelled : 0 }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
