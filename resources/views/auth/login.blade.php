
    <div
        class="ltn__breadcrumb-area ltn__breadcrumb-area-2 ltn__breadcrumb-color-white bg-overlay-theme-black-90 bg-image"
        data-bg="{{asset("banners/account.jpg")}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ltn__breadcrumb-inner ltn__breadcrumb-inner-2 justify-content-between">
                        <div class="section-title-area ltn__section-title-2">
                            <h1 class="section-title white-color">{{__("Account")}}</h1>
                            <div class="ltn__breadcrumb-list" style="margin-left:0;">
                                <ul>
                                    <li><a href="{{route("root")}}">{{__("Home")}}</a></li>
                                    <li>{{__("Login")}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- BREADCRUMB AREA END -->

    <!-- LOGIN AREA START -->
    <div class="ltn__login-area pb-65">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title-area text-center m-0">
                        <h1 class="section-title">{{__("Sign In")}} <br>{{__("To Your Account")}}</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-login-inner">
                        <form action="{{route("login")}}" method="post" class="ltn__form-box contact-form-box">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">{{__("Email")}}</label>
                                <input name="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       placeholder="{{ old('email', 'admin@gmail.com') }}" id="username"
                                       placeholder="Enter Email" autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{__("Password")}}</label>
                                <div class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                    <input type="password" name="password"
                                           class="form-control  @error('password') is-invalid @enderror"
                                           id="userpassword" placeholder="******" placeholder="Enter password"
                                           aria-label="Password" aria-describedby="password-addon">
{{--                                    <button class="btn btn-light " type="button" id="password-addon"><i--}}
{{--                                            class="mdi mdi-eye-outline"></i></button>--}}
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
                                    {{__("Remember me")}}
                                </label>
                            </div>

                            <div class="mt-3 d-grid">
                                <button class="theme-btn-1 btn btn-block" type="submit">{{__("SIGN IN")}}</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- LOGIN AREA END -->

