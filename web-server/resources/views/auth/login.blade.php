@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <hr style="color: grey">
        <!-- LOGIN AREA START -->
        <div class="ltn__login-area pb-65  m-5" >
            <div class="container card col-12 col-md-9 col-lg-6  mt-5">
                <div class="row">
                    <div class="col-lg-12 mt-4">
                        <div class="section-title-area text-center m-0">
                            <h1 class="section-title">Вход</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-login-inner">
                            <form action="{{route("login")}}" method="post" class="ltn__form-box contact-form-box">
                                @csrf
                                <div class="mb-3">
                                    <label for="username" class="form-label">Имейл</label>
                                    <input name="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           placeholder="{{ old('email', 'youremail@gmail.com') }}" id="username" autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Парола</label>
                                    <div class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                        <input type="password" name="password"
                                               class="form-control  @error('password') is-invalid @enderror"
                                               id="userpassword" placeholder="******"
                                               aria-label="Password" aria-describedby="password-addon">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        Запомни ме
                                    </label>
                                </div>

                                <div class="mt-3 d-grid">
                                    <button class="theme-btn-1 btn btn-block btn btn-primary" type="submit">Влез</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- LOGIN AREA END -->
    </div>
</main>
@endsection
