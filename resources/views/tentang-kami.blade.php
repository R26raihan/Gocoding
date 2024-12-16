<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - GOcoding</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">GOcoding</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/daftararticles') }}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/siswa/kategori-soal') }}">Soal</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/tentang-kami') }}">Tentang Kami</a></li>

                    <!-- Check if user is logged in -->
                    @if (Auth::check())
                        <!-- Show logout if logged in -->
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-logout nav-link" style="color: inherit;">Logout</button>
                            </form>
                        </li>
                    @else
                        <!-- Show login if not logged in -->
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <section class="Tentang-kami">
        <div class="container">
            <div class="row align-items-center">
                <!-- Gambar di sebelah kiri -->
                <div class="col-md-6">
                    <img src="{{ asset('images/Open source-cuate.png') }}" class="img-fluid rounded shadow-lg" alt="GOcoding Image">
                </div>

                <!-- Penjelasan di sebelah kanan -->
                <div class="col-md-6">
                    <h2>Tentang GOcoding</h2>
                    <p>
                        GOcoding adalah platform pembelajaran coding yang dirancang khusus untuk anak-anak SD. Kami bertujuan untuk memberikan pengalaman belajar yang menyenangkan dan mudah dipahami oleh generasi muda Indonesia. Dengan materi yang sederhana dan berbasis proyek, anak-anak dapat mempelajari keterampilan digital yang akan sangat berguna di masa depan.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <section class="visi-misi">
        <div class="container">
            <div class="row align-items-center">
                <!-- Penjelasan Visi dan Misi di sebelah kiri -->
                <div class="col-md-6">
                    <h2>Visi dan Misi GOcoding</h2>

                    <!-- Visi -->
                    <div class="visi">
                        <h3>Visi Kami</h3>
                        <p>
                            Menjadi platform pembelajaran coding terkemuka yang menyediakan akses mudah dan menyenangkan untuk anak-anak, serta mendukung guru dalam menciptakan lingkungan belajar yang inovatif dan penuh semangat.
                        </p>
                    </div>

                    <!-- Misi -->
                    <div class="misi">
                        <h3>Misi Kami</h3>
                        <ul>
                            <li>Menyediakan artikel dan materi belajar coding yang sederhana dan mudah dipahami oleh anak-anak.</li>
                            <li>Mendukung pembelajaran siswa yang ingin belajar dasar coding.</li>
                            <li>Menciptakan pengalaman belajar yang interaktif, menyenangkan, dan berdampak positif bagi masa depan anak-anak Indonesia.</li>
                        </ul>
                    </div>
                </div>

                <!-- Gambar di sebelah kanan -->
                <div class="col-md-6">
                    <img src="{{ asset('images/Open source-pana.png') }}" class="img-fluid rounded shadow-lg" alt="Visi dan Misi GOcoding">
                </div>
            </div>
        </div>
    </section>





</body>
</html>
