@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Thông Tin')}}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="form-group row " style="font-size: 22px">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Họ Và Tên') }} :</label>
                            <div class="col-md-6">
                                <p class=" col-form-label">{{Auth::user()->name}}</p>
                            </div>
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Email') }} :</label>
                            <div class="col-md-6">
                                <p class=" col-form-label">{{Auth::user()->email}}</p>
                            </div>
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Số Điện Thoại') }} :</label>
                            <div class="col-md-6">
                                @if(Auth::user()->phone)
                                    <p class=" col-form-label">{{"0".Auth::user()->phone}}</p>
                                @else
                                    <p class=" col-form-label">Chưa Có Thông Tin</p>
                                @endif
                            </div>
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Tuổi') }} :</label>
                            <div class="col-md-6">
                                @if(Auth::user()->age)
                                    <p class=" col-form-label">{{Auth::user()->age}}</p>
                                @else
                                    <p class=" col-form-label">Chưa Có Thông Tin</p>
                                @endif
                            </div>
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Địa Chỉ') }} :</label>
                            <div class="col-md-6">
                                @if(Auth::user()->address)
                                    <p class=" col-form-label">{{Auth::user()->address}}</p>
                                @else
                                    <p class=" col-form-label">Chưa Có Thông Tin</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
