<x-auth-layout>
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html"><img src="/assets/images/logo/logo.png" alt="Logo"></a>
                </div>
                <h1 class="h1 text-success">Registrasi member</h1>
                <p class="mb-5 h6" style="color: #19875480">Isi form berikut untuk mendaftar member baru.</p>

                <form method="post">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" name="email" class="form-control form-control-xl" placeholder="Masukkan Email Anda">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" name="name" class="form-control form-control-xl" placeholder="Masukkan nama lengkap Anda">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" class="form-control form-control-xl" placeholder="Masukkan password Anda">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password_confirm" class="form-control form-control-xl" placeholder="Masukkan konfirmasi password Anda">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password_confirm') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <button class="btn btn-success btn-block btn-lg shadow mt-5">Daftar</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-success">Masuk</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-flex justify-content-center align-items-center">
            <div id="">
                <img src="/assets/images/undraw/undraw_Access_account_re_8spm.svg" style="width: 75%" alt="">
            </div>
        </div>
    </div>
</x-auth-layout>