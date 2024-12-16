<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penulis Soal - PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Dashboard Penulis Soal</h1>


    <h2>Soal Dikelompokkan Berdasarkan Kategori</h2>
    @foreach ($groupedSoals as $kategoriName => $soals)
        <h3>{{ $kategoriName }}</h3>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Soal</th>
                    <th>Jawaban</th>
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
                                    <li>{{ $jawaban->jawaban }} @if ($jawaban->is_correct) (Benar) @endif</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
</body>
</html>
