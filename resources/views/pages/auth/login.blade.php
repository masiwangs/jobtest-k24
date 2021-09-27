<x-auth-layout>
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="index.html"><img src="/assets/images/logo/logo.png" alt="Logo"></a>
                </div>
                <h1 class="h1 text-success">Masuk platform</h1>
                <p class="mb-5 h6" style="color: #19875480">Masukkan email dan kata sandi Anda untuk masuk platform.</p>

                <form method="post">
                    @csrf
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                    </div>
                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" class="form-control form-control-xl" placeholder="Kata sandi">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-block btn-lg shadow mt-5">Masuk</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Belum punya akun? <a href="{{ route('register') }}" class="font-bold text-success">Registrasi</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-flex justify-content-center align-items-center">
            <div id="">
                <img src="/assets/images/undraw/undraw_security_o890.svg" style="width: 75%" alt="">
            </div>
        </div>
    </div>
</x-auth-layout>