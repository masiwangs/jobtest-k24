<x-app-layout>
    <x-navbar/>
    <div class="content-wrapper container mb-4">
        <div class="page-content">
            <div class="row">
                <div class="col-md-3 col-12 order-2 order-lg-1">
                    <div class="card">
                        <div class="card-content">
                            <img src="{{ \Storage::url($user->foto) }}" class="img-fluid rounded" alt="singleminded">
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-12 order-1 order-lg-2">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">
                                <p class="h2 text-success">{{ $user->name }}</p>
                            </div>
                            <div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Nomor ID KTP</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $user->id_ktp }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Jenis Kelamin</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $user->jenis_kelamin == 1 ? 'Laki-laki' : 'Perempuan' }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Tanggal Lahir</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $user->tgl_lahir }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Email</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <p class="fw-semibold">Nomor HP</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $user->no_hp }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>