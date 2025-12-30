@empty($user)
    @else
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <th class="text-right col-3">Foto Profil :</th>
                        <td class="col-9">
                            @if($user->avatar)
                                <img src="{{ asset('storage/photos/' . $user->avatar) }}" class="img-thumbnail" style="width: 150px;">
                            @else
                                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-thumbnail" style="width: 150px;">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">ID :</th>
                        <td class="col-9">{{ $user->user_id }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Level Pengguna :</th>
                        <td>{{ $user->level->level_nama }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Username :</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <th class="text-right col-3">Nama Lengkap :</th>
                        <td>{{ $user->nama }}</td>
                    </tr>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary">Tutup</button>
            </div>
        </div>
    </div>
@endempty