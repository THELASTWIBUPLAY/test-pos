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
                <th>ID Level</th>
            </tr>
        </thead>
        <tbody>
            {{-- Loop untuk menampilkan data dari variabel $user --}}
            {{-- foreach tidak bisa dipakai di retriving single model --}}
            {{-- @foreach ($user as $d) --}} 
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->level_id}}</td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
    <table border="1" cellpadding="2" cellspacing="0">
        <thead>
            <tr>
                {{-- <th>Jumlah Pengguna</th> --}}
            </tr>
        </thead>
        <tbody>
                <tr>
                    {{-- <td>{{$user}}</td> --}}
                </tr>
        </tbody>
    </table>
</body>
</html>