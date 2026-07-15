@extends('layouts.app')

@section('title', trans('discord-login::messages.register.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-6">
        <h1>{{ trans('discord-login::messages.register.title') }}</h1>

        <div class="alert alert-warning">
            <i class="bi bi-exclamation-triangle"></i>
            {{ trans($duplicate ? 'discord-login::messages.register.duplicate_notice' : 'discord-login::messages.register.not_found') }}
        </div>

        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('discord-login.register') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" for="name">{{ trans('auth.name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $defaultName) }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    @if($discordEmail !== null)
                        <div class="mb-3">
                            <label class="form-label">{{ trans('auth.email') }}</label>
                            <input type="email" class="form-control" value="{{ $discordEmail }}" disabled>
                            <div class="form-text">{{ trans('discord-login::messages.register.email_help') }}</div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label" for="password">{{ trans($passwordRequired ? 'auth.password' : 'discord-login::messages.register.password_optional') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" @required($passwordRequired)>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        @unless($passwordRequired)
                            <div class="form-text">{{ trans('discord-login::messages.register.password_help') }}</div>
                        @endunless
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="password-confirm">{{ trans('auth.confirm_password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" @required($passwordRequired)>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            {{ trans('discord-login::messages.register.submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
