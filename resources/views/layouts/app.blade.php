<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nama Produk Kamu - Madu Alami</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        :root {
            --amber: #F59E0B;
            --amber-dark: #B45309;
            --amber-light: #FEF3C7;
        }
        body { font-family: 'Segoe UI', sans-serif; }
        .btn-amber {
            background-color: var(--amber);
            color: white;
            border: none;
            padding: 12px 32px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-amber:hover { background-color: var(--amber-dark); color: white; }
    </style>
</head>
<body>
    @include('components.navbar')
    @yield('content')
    @include('components.footer')
</body>
</html>