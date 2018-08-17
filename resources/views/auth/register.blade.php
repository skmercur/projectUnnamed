@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">


                                <div class="col-md-6 mb-3">
                                   <label for="firstName">{{ __('First name') }}</label>
                                       <input id="firstname" type="text" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" placeholder="" value="{{ old('firstname') }}" required="">
                                       @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                          <div class="invalid-feedback">
                                               Valid first name is required.
                                          </div>
                                </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastname">{{ __('Last name') }}</label>
                                <input id="lastname" type="text" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" placeholder="" value="{{ old('lastname') }}" required="">


                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                             <div class="invalid-feedback">
                             Valid last name is required.
                         </div>

                    </div>



                        </div>

                                                <div class="form-group row">
                                                    <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                                        @if ($errors->has('username'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('username') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                                                    <div class="col-md-6">
                                                      <select name="gender" class="form-control" data-live-search="true">
                                                        <option value="male">male</option>
                                                        <option value="female">female</option>
                                                        <option value="other">other</option>
                                                      </select>
                                                    </div>
                                                </div>



                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                <p style="font-size:7pt">Your email will be visible to the public</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="checkbox-confirm" class="col-md-4 col-form-label text-md-right">Check the checkbox to accept our terms and conditions</label>

                            <div class="col-md-6">
                                <input id="checkbox-confirm" type="checkbox" class="form-control" name="checkbox_confirmation" required>
                                <br>
                                <a href="">Terms and conditions</a>

                            </div>

                        </div>
                        <br>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

 -->


<div class="container pt-lg-md">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="card bg-secondary shadow border-0">
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <h4>Register</h4>
                </div>
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <input id="firstname" type="text" placeholder="Firstname" class="form-control{{ $errors->has('firstname') ? ' is-invalid' : '' }}" name="firstname" placeholder="" value="{{ old('firstname') }}" required="">
                                       @if ($errors->has('firstname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                          <div class="invalid-feedback">
                                               Valid first name is required.
                                          </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <input id="lastname" type="text" placeholder="Lastname" class="form-control{{ $errors->has('lastname') ? ' is-invalid' : '' }}" name="lastname" value="{{ old('lastname') }}" required="">
                                @if ($errors->has('lastname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                @endif
                             <div class="invalid-feedback">
                             Valid last name is required.
                         </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                                        @if ($errors->has('username'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('username') }}</strong>
                                                            </span>
                                                        @endif
                    </div>
                  </div>
                  <div class="form-group row">
                        <div class="col-md-6">
                            <select name="gender" class="form-control" data-live-search="true">
                                <option value="male">male</option>
                                <option value="female">female</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                    </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative mb-3">
                      <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                    </div>
                                <p style="font-size:7pt">Your email will be visible to the public</p>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">

                      <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-alternative">
                      <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                    </div>
                  </div>
                  <div class="row my-4">
                    <div class="col-12">
                      <div class="custom-control custom-control-alternative custom-checkbox">
                        <input class="custom-control-input" id="customCheckRegister" type="checkbox" required>
                        <label class="custom-control-label" for="customCheckRegister">
                          <span>I agree with the
                            <a href="#">Privacy Policy</a>
                          </span>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary mt-4">Create account</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection


<!--//////////////////////////////regiter ///////////////////-->

      <!-- //////////////////////////////////// -->
