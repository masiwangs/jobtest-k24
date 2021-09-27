<x-app-layout>
    <x-navbar/>
    <div class="content-wrapper container mb-4">
        <div class="page-content d-flex justify-content-center">
            <form method="POST" action="{{ route('user') }}" enctype="multipart/form-data" style="max-width: 26em">
                @csrf
                @method('PUT')
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-triangle"></i>
                    Sebelum melanjutkan, harap lengkapi form identitas di bawah ini.
                </div>
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <div>
                            <div class="form-group">
                                <label for="foto-input">Foto diri</label>
                                <input type="file" name="file" class="form-control" id="foto-input" placeholder="Masukkan nomor ID KTP Anda">
                            </div>
                            <div class="form-group">
                                <label for="id-ktp-input">Nomor ID KTP</label>
                                <input type="number" name="id_ktp" class="form-control" id="id-ktp-input" placeholder="Masukkan nomor ID KTP Anda">
                            </div>
                            <div class="form-group">
                                <label for="tgl-lahir-input">Tanggal lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" id="tgl-lahir-input">
                            </div>
                            <div class="form-group">
                                <label for="jenis-kelamin-input">Jenis kelamin</label>
                                <select class="form-select" name="jenis_kelamin" id="jenis-kelamin-input">
                                    <option selected>Silahkan pilih..</option>
                                    <option value="1">Laki-laki</option>
                                    <option value="2">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nomor-hp-input">Nomor HP</label>
                                <input type="number" name="no_hp" class="form-control" id="nomor-hp-input">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100 shadow">Simpan</button>
            </form>
        </div>
    </div>
</x-app-layout>