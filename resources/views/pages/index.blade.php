<x-app-layout>
    <x-navbar/>
    <div class="content-wrapper container mb-4">
        <div class="page-content">
            <div class="row">
                <div class="col-md-3 col-12">
                    <div class="card">
                        <div class="card-content" style="positition:relative">
                            <button id="btn-ubah-foto" class="btn btn-sm btn-warning" style="position: absolute; top: 15px; right: 15px"><i class="bi bi-pencil"></i></button>
                            <img src="{{ \Storage::url(auth()->user()->foto) }}" class="img-fluid rounded" alt="singleminded">
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="h4 text-success">Menu</h4>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="mb-2"><a href="javascript:void(0)" id="btn-edit-profil" class="text-dark"><i class="bi bi-pencil"></i> Ubah informasi profil</a></div>
                                <div class="mb-2"><a href="javascript:void(0)" id="btn-hapus-akun" class="text-danger"><i class="bi bi-trash"></i> Hapus akun</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12">
                    @if ($errors->any())
                    <div class="card">
                        <div class="card-body bg-danger text-light">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <p class="h2 text-success">{{ auth()->user()->name }}</p>
                            </div>
                            <div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Nomor ID KTP</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ auth()->user()->id_ktp }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Jenis Kelamin</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ auth()->user()->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Tanggal Lahir</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ auth()->user()->tgl_lahir }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Email</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ auth()->user()->email }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Nomor HP</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ auth()->user()->no_hp }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Modal --}}
        <div class="modal fade" id="modal-edit-profil" tabindex="-1" aria-labelledby="modal-edit-profil-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <form method="POST" action="{{ route('user') }}" class="modal-content">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-edit-profil-label">Ubah informasi profil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="id-ktp-input" class="form-label">ID KTP</label>
                            <input type="number" class="form-control" id="id-ktp-input" placeholder="Masukkan ID KTP Anda" name="id_ktp" value="{{ auth()->user()->id_ktp }}">
                        </div>
                        <div class="mb-3">
                            <label for="nama-input" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama-input" placeholder="Masukkan nama lengkap Anda" name="name" value="{{ auth()->user()->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="jenis-kelamin-select" class="form-label">Jenis kelamin</label>
                            <select class="form-select" name="jenis_kelamin" id="jenis-kelamin-select" aria-label="Default select example">
                                <option selected>Silahkan pilih..</option>
                                <option value="1" {{ auth()->user()->jenis_kelamin == 1 ? 'selected' : '' }}>Laki-laki</option>
                                <option value="2" {{ auth()->user()->jenis_kelamin == 2 ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl-lahir-input" class="form-label">Tanggal lahir</label>
                            <input type="date" class="form-control" id="tgl-lahir-input" name="tgl_lahir" value="{{ auth()->user()->tgl_lahir }}">
                        </div>
                        <div class="mb-3">
                            <label for="email-input" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email-input" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="nomor-hp-input" class="form-label">Nomor HP</label>
                            <input type="number" class="form-control" id="nomor-hp-input" name="no_hp" value="{{ auth()->user()->no_hp }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="modal-ubah-foto" tabindex="-1" aria-labelledby="modal-ubah-foto-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('ubah-foto') }}" method="POST" enctype="multipart/form-data" class="modal-content">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-ubah-foto-label">Ubah foto diri</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="foto-input" class="form-label">Pilih foto baru</label>
                            <input class="form-control" type="file" name="file" id="foto-input">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan perubahan</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal fade" id="modal-hapus-akun" tabindex="-1" aria-labelledby="modal-hapus-akun-label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="{{ route('hapus-akun') }}" method="POST" class="modal-content">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header bg-danger ">
                        <h5 class="modal-title text-light" id="modal-hapus-akun-label">Hapus akun</h5>
                        <button type="button text-light" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Akun yang sudah dihapus tidak dapat dikembalikan. Lanjutkan?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
        {{-- Script --}}
        <script>
            $(document).ready(function() {
                let btn_edit_profil = $('#btn-edit-profil');
                let btn_ubah_foto = $('#btn-ubah-foto')
                let btn_hapus_akun = $('#btn-hapus-akun')
                let modal_edit_profil = new bootstrap.Modal($('#modal-edit-profil'))
                let modal_ubah_foto = new bootstrap.Modal($('#modal-ubah-foto'))
                let modal_hapus_akun = new bootstrap.Modal($('#modal-hapus-akun'))

                btn_edit_profil.click(function() {
                    modal_edit_profil.show()
                })

                btn_ubah_foto.click(function() {
                    modal_ubah_foto.show()
                })

                btn_hapus_akun.click(function(){
                    modal_hapus_akun.show()
                })
            })
        </script>
    </div>
</x-app-layout>