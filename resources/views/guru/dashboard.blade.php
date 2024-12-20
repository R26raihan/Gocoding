@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Penulis Soal</h1>
    <a href="{{ route('guru.createSoal') }}" class="btn btn-primary mb-3">Buat Soal Baru</a>
    <a href="{{ route('guru.exportPDF') }}" class="btn btn-success mb-3">Export ke PDF</a>

    @if ($groupedSoals->isEmpty())
        <p>Tidak ada soal yang tersedia.</p>
    @else
        @foreach ($groupedSoals as $kategoriName => $soals)
            <h3>{{ $kategoriName }}</h3> <!-- Menampilkan nama kategori -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Soal</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($soals as $soal)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $soal->soal }}</td>
                            <td>
                                <ul>
                                    @foreach ($soal->jawabans as $jawaban)
                                        <li>{{ $jawaban->jawaban }}
                                            @if ($jawaban->is_correct)
                                                (Benar)
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td>
                                <a href="{{ route('guru.editSoal', $soal->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('guru.deleteSoal', $soal->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endif

@endsection
