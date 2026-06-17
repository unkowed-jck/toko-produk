@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section style="background: linear-gradient(135deg, #FEF3C7, #F59E0B); min-height: 90vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold" style="color: #78350F;">Madu Alami Pilihan,<br>Langsung dari Alam</h1>
                <p class="lead my-4" style="color: #92400E;">Nikmati kelezatan dan khasiat madu murni berkualitas tinggi yang dipanen langsung dari peternakan lebah terpercaya.</p>
                <a href="#kontak" class="btn-amber btn">Pesan Sekarang</a>
            </div>
            <div class="col-lg-6 text-center mt-4 mt-lg-0">
                <div style="font-size: 12rem; line-height: 1;">🍯</div>
            </div>
        </div>
    </div>
</section>

{{-- TENTANG PRODUK --}}
<section id="tentang" class="py-5" style="background: #FFFBEB;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center mb-4 mb-lg-0">
                <div style="font-size: 8rem;">🌿🍯</div>
            </div>
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3" style="color: #78350F;">Apa itu Nama Produk Kamu?</h2>
                <p style="color: #555;">Nama Produk Kamu adalah madu alami murni yang diproduksi tanpa campuran bahan kimia apapun. Kami berkomitmen menghadirkan madu terbaik langsung ke tangan kamu.</p>
                <p style="color: #555;">Dipanen dengan metode tradisional dan higienis, menjaga kualitas dan kandungan nutrisi tetap sempurna.</p>
            </div>
        </div>
    </div>
</section>

{{-- KEUNGGULAN --}}
<section id="fitur" class="py-5" style="background: #FEF3C7;">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" style="color: #78350F;">Keunggulan Kami</h2>
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 h-100 text-center p-4" style="border-radius: 16px; background: white;">
                    <div style="font-size: 3rem;">🌱</div>
                    <h5 class="fw-bold mt-3" style="color: #B45309;">100% Alami</h5>
                    <p class="text-muted">Tanpa pengawet, tanpa pemanis buatan. Murni dari alam untuk kesehatan kamu.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 h-100 text-center p-4" style="border-radius: 16px; background: white;">
                    <div style="font-size: 3rem;">✅</div>
                    <h5 class="fw-bold mt-3" style="color: #B45309;">Sudah Teruji</h5>
                    <p class="text-muted">Produk kami telah melalui uji kualitas ketat untuk memastikan kemurnian dan keamanannya.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 h-100 text-center p-4" style="border-radius: 16px; background: white;">
                    <div style="font-size: 3rem;">🚚</div>
                    <h5 class="fw-bold mt-3" style="color: #B45309;">Pengiriman Cepat</h5>
                    <p class="text-muted">Kami memastikan produk sampai dengan aman dan cepat ke seluruh Indonesia.</p>
                </div>
            </div>
        </div>
    </div>
</section>



{{-- TESTIMONI --}}
{{-- TESTIMONI --}}
<section id="testimoni" class="py-5" style="background: #FFFBEB;">
    <div class="container">
        <h2 class="text-center fw-bold mb-5" style="color: #78350F;">Kata Pelanggan Kami</h2>
        <div class="row g-4">
            @forelse($testimoni as $item)
            <div class="col-md-4">
                <div class="card border-0 p-4 h-100" style="border-radius: 16px; background: #FEF3C7;">

                    {{-- Foto besar di atas --}}
                    @if($item->tipe_media === 'foto' && $item->foto)
                        <img src="{{ asset($item->foto) }}" class="w-100 mb-3" style="border-radius: 12px; height: 200px; object-fit: cover;">
                    @endif

                    {{-- Video di atas --}}
                    @if($item->tipe_media === 'video' && $item->video)
                        <video src="{{ asset($item->video) }}" class="w-100 mb-3" style="border-radius: 12px; max-height: 200px;" controls></video>
                    @endif

                    {{-- Komentar di bawah --}}
                    <p class="fst-italic mb-2">"{{ $item->komentar }}"</p>
                    <p class="fw-bold mb-0" style="color: #B45309;">{{ $item->nama }}{{ $item->asal ? ', ' . $item->asal : '' }}</p>
                    <small class="text-warning">
                        @for($i = 1; $i <= 5; $i++)
                            {{ $i <= $item->rating ? '⭐' : '☆' }}
                        @endfor
                    </small>

                </div>
            </div>
            @empty
            <div class="col-12 text-center text-muted">Belum ada testimoni.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- KONTAK --}}
<section id="kontak" class="py-5" style="background: #F59E0B;">
    <div class="container text-center">
        <h2 class="fw-bold mb-3 text-white">Tertarik? Hubungi Kami!</h2>
        <p class="text-white mb-4">Pesan sekarang dan dapatkan madu alami terbaik langsung ke pintu kamu.</p>
        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-light fw-bold px-5 py-3" style="border-radius: 8px; color: #B45309;">
            💬 Chat via WhatsApp
        </a>
    </div>
</section>

@endsection