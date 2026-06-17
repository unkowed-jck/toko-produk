<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #B45309;">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="/">🍯 Nama Produk Kamu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">
                @guest
                    <li class="nav-item"><a class="nav-link text-white" href="#tentang">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#fitur">Keunggulan</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#testimoni">Testimoni</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#kontak">Kontak</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="/admin/login">Admin</a></li>
                @else
                    <li class="nav-item"><a class="nav-link text-white" href="/admin/testimoni">Kelola Testimoni</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('admin.logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link text-white btn btn-link">Logout</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>