@extends('admin.main.main')

@section('admin-content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User_Id</th>
                        <th>Name</th>
                        <th>Mobile NO</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th>Date of Birth</th>
                        <th>Country</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Joining Date</th>
                        <th>Position</th>
                        <th>Experience</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item->userDetails->name ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->mobile_no ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->age ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->address ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->dob ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->country ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->state ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->city ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->joining_date ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->position ?? 'N/A' }}</td>
                            <td>{{ $item->userDetails->experience ?? 'N/A' }}</td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
