@extends('admin.main.main')

@section('admin-content')
    <div class="container">
        <h4 class="text-center">User Details Form</h4>

        @if(Session::has('success'))
            <div class="alert alert-success" role="alert" id="success-message">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(Session::has('fail'))
            <div class="alert alert-danger" role="alert" id="danger-message">
                {{ session('fail') }}
            </div>
        @endif

        <form method="POST" action="{{ url('user_detail') }}">
            @csrf

            <input type="hidden" name="user_id" value="{{Session::get('id')}}">
            <div class="row mt-5">
                <!-- User details form fields -->
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputName1">User Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Your Name" name="name" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputNumber1">Contact No</label>
                        <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Your Phone Number" name="mobile_no" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputNumber1">Age</label>
                        <input type="text" class="form-control" id="exampleInputNumber1" placeholder="Enter Your Age" name="age" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputDate1">Date of Birth</label>
                        <input type="date" class="form-control" id="exampleInputDate1" name="dob" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputAddress1">Address</label>
                        <input type="text" class="form-control" id="exampleInputAddress1" placeholder="Enter Your Address" name="address" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputName1">Country</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter Country Name" name="country" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputName1">State</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter State Name" name="state" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputName1">City</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter City Name" name="city" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputDate1">Joining Date</label>
                        <input type="date" class="form-control" id="exampleInputDate1" name="joining_date" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputPosition1">Position</label>
                        <input type="text" class="form-control" id="exampleInputPosition1" placeholder="Enter Your Position" name="position" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="exampleInputExperience1">Experience</label>
                        <input type="text" class="form-control" id="exampleInputExperience1" placeholder="Enter Your Experience" name="experience" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script>
        setTimeout(() => {
            $('#success-message').fadeOut('fast');
        }, 4000);

        setTimeout(() => {
            $('#danger-message').fadeOut('fast');
        }, 4000);
    </script>
@endsection
