@extends('user.layouts.master')

@section('title')
    User
@endsection

@section("content")
    <!--Main Navigation-->

    <!--Main layout-->

    <!--Main layout-->

    <div class="container pt-4 col-12 " >


        <!-- BREADCRUMB AREA END -->

        <!-- LOGIN AREA START -->
        <div class="ltn__login-area pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title-area text-center m-0">
                            <h1 class="section-title">{{__("Sign up")}}</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-login-inner">
                            <form method="POST" class="form-horizontal" action="{{ route('register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="useremail" class="form-label">Имейл</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                                           value="{{ old('email') }}" name="email" placeholder="Въведенте имейл" autofocus required>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="username" class="form-label">Име</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('name') }}" id="username" name="name" autofocus required
                                           placeholder="Вашето име">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="userpassword" class="form-label">Парола</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"
                                           placeholder="********" autofocus required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>



                                <div class="mt-4 d-grid">
                                    <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Регистрирай се</button>
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
