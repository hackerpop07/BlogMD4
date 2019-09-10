@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user.changePassword') }}">
                            @csrf
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    <ul>
                                        <li>{!! Session::get('error') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <ul>
                                        <li>{!! Session::get('success') !!}</li>
                                    </ul>
                                </div>
                            @endif
                            @if(Auth::user()->provider)
                                <div class="alert alert-primary" style="text-align: center">
                                    Mật Khẩu mặc định là: 123
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mật Khẩu Cũ') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('current-password') is-invalid @enderror"
                                           name="current-password"
                                           required>
                                    @error('current-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Mật Khẩu Mới') }}</label>

                                <div class="col-md-6">
                                    <input id="new-password" type="password"
                                           class="form-control @error('new-password') is-invalid @enderror"
                                           name="new-password"
                                           required>

                                    @error('new-password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Nhập Lại Mật Khẩu') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="new-password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Đổi Mật Khẩu') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
