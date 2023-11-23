<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Error Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container d-flex flex-column align-items-center justify-content-center" style="height: 100vh;">
    <h1 class="display-1">404 Error</h1>
    <p class="lead">Oops! The page you're looking for could not be found.</p>
    <a href="{{ route('index') }}" class="btn btn-primary">Halaman Utama</a>
  </div>
</body>
</html>
