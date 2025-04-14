@extends('template')
@section('content')
<div class="container-fluid">
   <h4 class="page-title">HR</h4>
   <div class="row">
      <a href="{{url('hr')}}"> <button type="button" class="btn btn-primary">Back</button></a>
      <div class="col-md-12">
         <div class="row">

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
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


{{-- For validation errors --}}
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->



<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-6">
        <div class="card p-4">
            <h5 class="text-center mb-4">{{isset($data) ? 'Update' : 'Add'}} HR</h5>
            <form action="{{isset($data) ? url('hr/update/'.$data->id) : url('hr/addData')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ isset($data) ? $data->name : '' }}" placeholder="John Doe">
                  
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ isset($data) ? $data->email : '' }}" placeholder="name@example.com">
                    @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
               
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ isset($data) ? $data->phone : '' }}" placeholder="9876543210">
                    @error('phone')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">DOB</label>
                    <input type="date" class="form-control" id="dob" name="dob" value="{{ isset($data) ? $data->dob : '' }}" placeholder="01/01/2001">
                    @error('dob')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>

                <div class="mb-3">
                <label for="inputState">Gender</label>
                <select id="inputState" name="gender" class="form-control">
                    <option value="">Choose...</option>
                    <option value="Male" {{ (isset($data->gender) && $data->gender == 'Male') ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ (isset($data->gender) && $data->gender == 'Female') ? 'selected' : '' }}>Female</option>
                </select>

                @error('gender')
                            <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" id="city" value="{{ isset($data) ? $data->city : '' }}" placeholder="Hyderabad">
                    @error('city')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                </div>
                
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">{{isset($data) ? 'Update' : 'Submit'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>


         </div>
      </div>
   </div>
</div>
</div>
@endsection