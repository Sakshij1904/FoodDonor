<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:500px;">

<div class="card shadow">

<div class="card-body">

<h2 class="text-center text-success mb-4">Register</h2>

@if(session('error'))
<div class="alert alert-danger">
{{ session('error') }}
</div>
@endif

<form action="/register" method="POST">

@csrf

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button class="btn btn-success w-100">
Register
</button>

</form>

<div class="text-center mt-3">
<a href="/login">Already have account?</a>
</div>

</div>

</div>

</div>

</body>
</html>