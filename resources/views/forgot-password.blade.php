@extends('mis3085::index')

@section('content')
    <div class="card">
        <div class="card-header"><p class="login-box-msg">{{ __('Reset Password') }}</p></div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.password.request') }}">
                @csrf

                <div class="form-group has-feedback {{ !$errors->has('email') ?: ' has-error' }}">
                    @if ($errors->has('email'))
                        @foreach($errors->get('email') as $message)
                            <label class="control-label" for="email"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
                        @endforeach
                    @endif
                    <input id="email" type="email" class="form-control" name="email" placeholder="{{ __('E-Mail Address') }}" value="{{ old('email') }}" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Send Password Reset Link') }}
                    </button>
                    <a href="{{ route('admin.login') }}" class="btn btn-block btn-link">
                        {{ __('Go back') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
