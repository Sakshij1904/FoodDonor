<!DOCTYPE html>
<html>
<head>
    <title>NGO Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <h2 class="text-success mb-4 text-center">
        NGO Dashboard - Food Donations
    </h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row mb-4">

        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body text-center">
                    <h5>Total</h5>
                    <h3>{{ $total }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body text-center">
                    <h5>Available</h5>
                    <h3>{{ $available }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-dark">
                <div class="card-body text-center">
                    <h5>Accepted</h5>
                    <h3>{{ $accepted }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body text-center">
                    <h5>Expired</h5>
                    <h3>{{ $expired }}</h3>
                </div>
            </div>
        </div>

    </div>

    <form method="GET" action="/dashboard" class="row mb-4">

        <div class="col-md-5">
            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="Search Donor or Food"
                value="{{ request('search') }}">
        </div>

        <div class="col-md-3">
            <select name="status" class="form-select">
                <option value="">All Status</option>
                <option value="Available" {{ request('status')=='Available' ? 'selected' : '' }}>
                    Available
                </option>
                <option value="Accepted" {{ request('status')=='Accepted' ? 'selected' : '' }}>
                    Accepted
                </option>
            </select>
        </div>

        <div class="col-md-2">
            <button class="btn btn-primary w-100">
                Search
            </button>
        </div>

        <div class="col-md-2">
            <a href="/dashboard" class="btn btn-secondary w-100">
                Reset
            </a>
        </div>

    </form>

    <table class="table table-bordered table-striped table-hover">

        <thead class="table-success">

        <tr>
            <th>ID</th>
            <th>Donor</th>
            <th>Food</th>
            <th>Quantity</th>
            <th>Phone</th>
            <th>Expiry</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        </thead>

        <tbody>
        @foreach($donations as $food)

<tr>

    <td>{{ $food->id }}</td>

    <td>{{ $food->donor_name }}</td>

    <td>{{ $food->food_type }}</td>

    <td>{{ $food->quantity }}</td>

    <td>{{ $food->phone }}</td>

    <td>
        @if(strtotime($food->expiry_time) < time())

            <span class="badge bg-danger">
                Expired
            </span>

        @else

            {{ $food->expiry_time }}

        @endif
    </td>

    <td>

        @if($food->status=="Available")

            <span class="badge bg-success">
                Available
            </span>

        @else

            <span class="badge bg-primary">
                Accepted
            </span>

        @endif

    </td>

    <td>

        @if($food->status=="Available")

        <form action="{{ url('/accept/' . $food->id) }}" method="POST" class="mb-2">

            @csrf

            <button type="submit" class="btn btn-success btn-sm w-100">
                Accept Pickup
            </button>

        </form>

        @endif

        <a href="/edit/{{ $food->id }}" class="btn btn-warning btn-sm w-100 mb-1">
            Edit
        </a>

        <a href="/delete/{{ $food->id }}"
           class="btn btn-danger btn-sm w-100"
           onclick="return confirm('Are you sure you want to delete this donation?')">
            Delete
        </a>

    </td>

</tr>

@endforeach

</tbody>

</table>

</div>

</body>
</html>