@extends('mis3085::index')

@section('content')

<div class="card">
    <div class="card-header">
        <p class="login-box-msg">{{ __('Reset Password') }}</p>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route('admin.password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="form-group has-feedback {{ !$errors->has('email') ?: 'has-error' }}">
                @if ($errors->has('email'))
                    @foreach($errors->get('email') as $message)
                        <label class="control-label" for="email"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                    @endforeach
                @endif

                <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email', $request->email) }}" required autofocus>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback {{ !$errors->has('password') ?: 'has-error' }}">
                @if ($errors->has('password'))
                    @foreach($errors->get('password') as $message)
                        <label class="control-label" for="password"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                    @endforeach
                @endif

                <input id="password" type="password" class="form-control" name="password" placeholder="{{ trans('admin.password') }}" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group has-feedback">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('admin.password_confirmation') }}" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>

            <div class="form-group ">
                <button type="submit" class="btn btn-primary btn-flat btn-block">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
