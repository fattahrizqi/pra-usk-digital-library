<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laporan Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <table >
        <thead>
          <tr>
            <th>No.</th>
            <th>Judul Buku</th>
            <th>Peminjam</th>
            <th>Admin</th>
            <th>Status</th>
            <th>Tgl Pinjam</th>
            <th>Tgl Kembali</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($bookings as $booking)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$booking->book->title}}</td>
                <td>{{$booking->user->username}}</td>
                <td>{{$booking->admin->username}}</td>
                <td>{{isset($booking->tgl_kembali)? 'selesai' : 'dipinjam'}}</td>
                <td>{{$booking->created_at->format('d M Y')}}</td>
                <td>{{ ($booking->tgl_kembali)? $booking->tgl_kembali : '-' }}</td>
            </tr>
        @endforeach
        </tbody>
      </table>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>