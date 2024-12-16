@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-4">Kategori Soal</h1>
    <p class="text-center mb-4">Berikut adalah kategori soal yang dibuat oleh Penulis Soal. Selamat Berlatih!</p>

    @if ($kategoriSoals->isEmpty())
        <p class="text-center">Belum ada kategori soal yang tersedia.</p>
    @else
        <div class="row">
            @foreach ($kategoriSoals as $kategori)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-header text-center bg-primary text-white">
                            <h5 class="card-title">{{ $kategori->nama_kategori }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Jumlah Soal: {{ $kategori->soals->count() }} soal</p>
                            <a href="{{ route('siswa.lihatSoal', $kategori->id) }}" class="btn btn-primary btn-block">Lihat Soal</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Menambahkan Diagram Skor Pengguna -->
    <h2 class="text-center mt-4">Skor Kamu nih!!</h2>
    <canvas id="scoreChart"></canvas>

    <!-- Menyertakan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Mengambil data skor dari Blade (Laravel)
        const scores = @json($scores);

        // Persiapkan data untuk Chart.js
        const labels = scores.map(score => score.subject); // Subjek sebagai label
        const data = scores.map(score => score.score);     // Skor sebagai data

        // Menggambar diagram menggunakan Chart.js
        const ctx = document.getElementById('scoreChart').getContext('2d');
        const scoreChart = new Chart(ctx, {
            type: 'bar', // Jenis diagram (bar chart)
            data: {
                labels: labels, // Label sumbu X (subjek)
                datasets: [{
                    label: 'Skor Pengguna',
                    data: data, // Data untuk sumbu Y (skor)
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Warna latar belakang bar
                    borderColor: 'rgba(54, 162, 235, 1)', // Warna border bar
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
@endsection
