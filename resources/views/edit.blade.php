<!DOCTYPE html>
<html>
<head>
    <title>Edit Donation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:700px">

<div class="card shadow">

<div class="card-body">

<h2 class="text-center text-warning mb-4">
Edit Food Donation
</h2>

<form action="/update/{{ $food->id }}" method="POST">

@csrf

<div class="mb-3">
<label>Donor Name</label>
<input type="text" name="donor_name" class="form-control"
value="{{ $food->donor_name }}" required>
</div>

<div class="mb-3">
<label>Food Type</label>
<input type="text" name="food_type" class="form-control"
value="{{ $food->food_type }}" required>
</div>

<div class="mb-3">
<label>Quantity</label>
<input type="text" name="quantity" class="form-control"
value="{{ $food->quantity }}" required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control"
value="{{ $food->phone }}" required>
</div>

<div class="mb-3">
<label>Expiry Time</label>
<input type="datetime-local"
name="expiry_time"
class="form-control"
value="{{ date('Y-m-d\TH:i', strtotime($food->expiry_time)) }}"
required>
</div>

<button class="btn btn-warning w-100">
Update Donation
</button>

</form>

<div class="text-center mt-3">
<a href="/dashboard">Back to Dashboard</a>
</div>

</div>

</div>

</div>

</body>
</html>