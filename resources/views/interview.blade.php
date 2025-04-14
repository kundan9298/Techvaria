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
                <table class="table table-head-bg-success table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Candidate Name</th>
                            <th>Job Name</th>
                            <th>HR Name</th>
                            <th>Status</th>
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

                            <td>{{ $list->job_name }}</td>

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

                            {{-- Action Icons --}}
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

            console.log('Interview ID:', interviewId, 'changed to', selectedStatus);

            $.ajax({
                url: '{{ url("interview/update-status") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: interviewId,
                    status: selectedStatus
                },
                success: function (response) {
                    console.log(response.message);
                    // Optionally show success message
                },
                error: function (xhr) {
                    console.error('Update failed:', xhr.responseText);
                    // Optionally show error message
                }
            });
        });
    });
</script>
@endsection
