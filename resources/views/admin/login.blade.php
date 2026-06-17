<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Nama Produk Kamu</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #FEF3C7, #F59E0B);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .btn-amber {
            background-color: #F59E0B;
            color: white;
            border: none;
            padding: 10px 32px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            transition: background 0.2s;
        }
        .btn-amber:hover { background-color: #B45309; color: white; }
    </style>
</head>
<body>
    <div class="card border-0 p-5 shadow" style="width: 100%; max-width: 420px; border-radius: 16px;">
        <div class="text-center mb-4">
            <div style="font-size: 3rem;">🍯</div>
            <h4 class="fw-bold mt-2" style="color: #78350F;">Login Admin</h4>
            <p class="text-muted small">Nama Produk Kamu</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.post') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-4">
                <label class="form-label fw-bold">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn-amber btn">Masuk</button>
        </form>
    </div>
</body>
</html>