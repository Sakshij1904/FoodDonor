<!DOCTYPE html>
<html>
<head>
    <title>FoodDonor</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Food Donation Form</h3>

</div>

<div class="card-body">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

<form action="/donate" method="POST">

@csrf

<div class="mb-3">

<label>Donor Name</label>

<input type="text" class="form-control" name="donor_name">

</div>

<div class="mb-3">

<label>Phone</label>

<input type="text" class="form-control" name="phone">

</div>

<div class="mb-3">

<label>Email</label>

<input type="email" class="form-control" name="email">

</div>

<div class="mb-3">

<label>Food Type</label>

<input type="text" class="form-control" name="food_type">

</div>

<div class="mb-3">

<label>Quantity</label>

<input type="text" class="form-control" name="quantity">

</div>

<div class="mb-3">

<label>Address</label>

<textarea class="form-control" name="address"></textarea>

</div>

<div class="mb-3">

<label>Expiry Time</label>

<input type="datetime-local" class="form-control" name="expiry_time">

</div>

<button class="btn btn-success">

Donate Food

</button>

<a href="/dashboard" class="btn btn-primary">

NGO Dashboard

</a>

</form>

</div>

</div>

</div>

</body>

</html>