@extends('template')

@section('content')
<div class="container-fluid">
    <h4 class="page-title">Interview</h4>

    <a href="{{ url('interview/add') }}">
        <button type="button" class="btn btn-primary">Add Interview</button>
    </a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <div class="col-md-12">
        <div class="row">
            <div class="card-body">

                {{-- Responsive Table --}}
                <div class="table-responsive">
                    <table class="table table-sm table-head-bg-success table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Candidate Name</th>
                                <th>Job Name</th>
                                <th>HR Name</th>
                                <th>Status</th>
                                <th>Screening</th>
                                <th>Submissions</th>
                                <th>Offered</th>
                                <th>Hired</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $list)
                            <tr>
                                <td>{{ $list->id }}</td>

                                {{-- Candidate Name --}}
                                <td>
                                    @foreach($candidateData as $candidatelist)
                                        @if($candidatelist->id == $list->candidate_name)
                                            {{ $candidatelist->name }}
                                        @endif
                                    @endforeach
                                </td>

                                {{-- Job Name --}}
                                <td>
                                    @foreach($departmentData as $departmentList)
                                        @if($list->job_name == $departmentList->id)
                                            {{ $departmentList->name }}
                                        @endif
                                    @endforeach
                                </td>

                                {{-- HR Name --}}
                                <td>
                                    @foreach($hrData as $hrlist)
                                        @if($hrlist->id == $list->assigned_to_hr)
                                            {{ $hrlist->name }}
                                        @endif
                                    @endforeach
                                </td>

                                {{-- Status Dropdown --}}
                                <td>
                                    <select name="status" class="form-control status-dropdown" data-id="{{ $list->id }}">
                                        @php
                                            $statuses = ['Pending', 'Completed', 'Cancelled'];
                                            $colors = [
                                                'Pending' => 'color: orange;',
                                                'Completed' => 'color: green;',
                                                'Cancelled' => 'color: red;',
                                            ];
                                        @endphp

                                        @foreach($statuses as $status)
                                            <option value="{{ $status }}"
                                                style="{{ $colors[$status] }}"
                                                {{ $list->status == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                {{-- Screening --}}
                                <td>
                                    <select name="screening" class="form-control status-dropdown" data-id="{{ $list->id }}">
                                        
                                        <option value="1" {{$list->screening == '1' ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{$list->screening == '0' ? 'selected' : ''}}>No</option>
                                     
                                    </select>
                                </td>

                                {{-- Submissions --}}
                                <td>
                                    <select name="submission" class="form-control status-dropdown" data-id="{{ $list->id }}">
                                        
                                        <option value="1" {{$list->submission == '1' ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{$list->submission == '0' ? 'selected' : ''}}>No</option>
                                     
                                    </select>
                                </td>

                                {{-- Offered --}}
                                <td>
                                    <select name="offered" class="form-control status-dropdown" data-id="{{ $list->id }}">
                                        
                                        <option value="1" {{$list->offered == '1' ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{$list->offered == '0' ? 'selected' : ''}}>No</option>
                                     
                                    </select>
                                </td>

                                {{-- Hired --}}
                                <td>
                                    <select name="hire" class="form-control status-dropdown" data-id="{{ $list->id }}">
                                        
                                        <option value="1" {{$list->hire == '1' ? 'selected' : ''}}>Yes</option>
                                        <option value="0" {{$list->hire == '0' ? 'selected' : ''}}>No</option>
                                     
                                    </select>
                                </td>

                                {{-- Action --}}
                                <td>
                                    <a href="{{ url('interview/edit/'.$list->id) }}">
                                        <i style="font-size:25px;" class="la la-edit"></i>
                                    </a> || 
                                    <a href="{{ url('interview/delete/'.$list->id) }}">
                                        <i style="font-size:25px;" class="la la-bitbucket"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> {{-- .table-responsive --}}

            </div>
        </div>
    </div>
</div>

{{-- jQuery & AJAX Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.status-dropdown').on('change', function () {
            const selectedStatus = $(this).val();
            const interviewId = $(this).data('id');
            const name = $(this).attr('name');
            console.log(name);

            $.ajax({
                url: '{{ url("interview/update-status") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: interviewId,
                    status: selectedStatus,
                    name:name,
                },
                success: function (response) {
                    console.log(response.message);
                },
                error: function (xhr) {
                    console.error('Update failed:', xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
