@extends('template')

@section('content')
<div class="container-fluid">
    <h4 class="page-title">Interview</h4>
    <a href="{{ url('interview') }}">
        <button type="button" class="btn btn-primary mb-3">Back</button>
    </a>

    <style>
        body {
            background: #f8f9fa;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.05);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #4c9aff;
        }
        .btn-primary {
            border-radius: 30px;
            background-color: #4c9aff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #3a7dd8;
        }
    </style>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


   

    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <div class="card p-4">
                <h5 class="text-center mb-4">{{ isset($data) ? 'Update' : 'Add' }} Interview</h5>
                <form action="{{ isset($data) ? url('interview/update/'.$data->id) : url('interview/addData') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label">Job Name / Domain Name</label>
                        <input type="text" name="job_name" class="form-control" value="{{ $data->job_name ?? '' }}" placeholder="Job Name">
                        @error('job_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    
                    <div class="mb-3">
                        <label class="form-label">Candidate Name</label>
                        <select name="candidate_name" class="form-control">
                            <option value="">Select Candidate</option>
                            @foreach($candidateData as $list)
                                <option value="{{ $list->id }}" 
                                    {{ isset($data->candidate_name) && $list->id == $data->candidate_name ? 'selected' : '' }}>
                                    {{ $list->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Assigned To (HR Name)</label>
                        <select name="assigned_to" class="form-control">
                            <option value="">Select HR</option>
                            @foreach($hrData as $list)
                                <option value="{{ $list->id }}"
                                    {{ isset($data->assigned_to_hr) && $list->id == $data->assigned_to_hr ? 'selected' : '' }}>
                                    {{ $list->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('assigned_to')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Place</label>
                        <input type="text" name="place" class="form-control" value="{{ $data->place ?? '' }}" placeholder="Interview Place">
                        @error('place')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Date</label>
                        <input type="date" name="date" class="form-control" value="{{ $data->date ?? '' }}">
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Time</label>
                        <input type="time" name="time" class="form-control" value="{{ $data->time ?? '' }}">
                        @error('time')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Reminder</label>
                        <select name="reminder_type" class="form-control" required>
                            <option value="">Select Reminder</option>
                            <option value="10_minutes_before" {{ isset($data->remainder) && $data->remainder == '10_minutes_before' ? 'selected' : '' }}>10 Minutes Before</option>
                            <option value="30_minutes_before" {{ isset($data->remainder) && $data->remainder == '30_minutes_before' ? 'selected' : '' }}>30 Minutes Before</option>
                            <option value="1_hour_before" {{ isset($data->remainder) && $data->remainder == '1_hour_before' ? 'selected' : '' }}>1 Hour Before</option>
                            <option value="1_day_before" {{ isset($data->remainder) && $data->remainder == '1_day_before' ? 'selected' : '' }}>1 Day Before</option>
                        </select>
                        @error('assigned_to')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">{{ isset($data) ? 'Update' : 'Submit' }}</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
