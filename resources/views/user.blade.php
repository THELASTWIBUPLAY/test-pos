<!DOCTYPE html>
<html>
<head>
    <title>Data User</title>
</head>
<body>
    <h1>Data User</h1>
    
    <table border="1" cellpadding="2" cellspacing="0">
        <thead>
            <tr>
                <th>ID User</th>
                <th>Username</th>
                <th>Nama Pengguna</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop untuk menampilkan data dari variabel $user --}}
            @foreach ($user as $d)
                <tr>
                    <td>{{ $d->user_id }}</td>
                    <td>{{ $d->username }}</td>
                    <td>{{ $d->nama }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>