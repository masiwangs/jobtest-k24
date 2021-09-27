<x-app-layout>
    <x-navbar/>
    <div class="content-wrapper container mb-4">
        <div class="page-content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="h4">Daftar Member</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID KTP</th>
                                            <th>Nama</th>
                                            <th>Tanggal lahir</th>
                                            <th>Jenis kelamin</th>
                                            <th>Email</th>
                                            <th>Nomor HP</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id_ktp }}</td>
                                            <td><a href="{{ route('user-show', ['id' => $user->id]) }}" class="text-success text-decoration-underline">{{ $user->name }}</a></td>
                                            <td>{{ $user->tgl_lahir }}</td>
                                            <td>{{ $user->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->no_hp }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>