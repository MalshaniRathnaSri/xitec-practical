<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <title>Health Care Pharmacy - Admin</title>
</head>
<body>
    <div class="container">
        @include('_admin.admin_nav')

        @yield('content')

    </div>
   
</body>
</html>