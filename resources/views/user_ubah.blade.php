<!DOCTYPE html>

<head>
    <title>Tambah Data</title>
</head>

<body>
    <h1>Form Ubah Data User</h1>
    <a href="/user"> Kembali</a>
    <br><br>

    <form method="post" action="/user/ubah_simpan/{{ $user->user_id }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <label>Username</label>
        <input type="text" name="username" placeholder="Masukan Username" value="{{ $user->username }}">
        <br>
        <label>Nama</label>
        <input type="text" name="nama" placeholder="Masukan Nama" value="{{ $user->nama }}">
        <br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Masukan Password" value="{{ $user->password }}">
        <br>
        <label>Level ID</label>
        <input type="number" name="level_id" placeholder="Masukan ID Level" value="{{ $user->level_id }}" min="1" max="3">
        <br><br>
        <input type="submit" class="btn btn-success" value="Ubah">
    </form>
</body>

</html>
