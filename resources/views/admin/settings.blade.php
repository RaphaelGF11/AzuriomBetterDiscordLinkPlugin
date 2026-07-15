@extends('admin.layouts.admin')

@section('title', 'Discord Login')

@section('content')
    @if($showHttpWarning)
        <div class="alert alert-warning">
            <i class="bi bi-exclamation-triangle"></i>
            {{ trans('discord-login::admin.http_warning') }}
        </div>
    @endif

    <div class="alert alert-info">
        <p>
            <i class="bi bi-info-circle"></i>
            @lang('discord-login::admin.info.setup', ['url' => route('admin.roles.index')])
        </p>

        <p>@lang('discord-login::admin.info.redirect_intro')</p>
        <ul class="mb-0">
            <li><code>{{ route('discord-login.callback') }}</code></li>
            <li><code>{{ route('discord-login.confirm.callback') }}</code></li>
        </ul>
    </div>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('discord-login.admin.settings.save') }}">
                @csrf

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="allow_duplicates" id="allow_duplicates" @checked($allowDuplicates)>

                    <label class="form-check-label" for="allow_duplicates">
                        {{ trans('discord-login::admin.allow_duplicates') }}
                    </label>

                    <div class="form-text">{{ trans('discord-login::admin.allow_duplicates_help') }}</div>
                </div>

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="allow_passwordless" id="allow_passwordless" @checked($allowPasswordless)>

                    <label class="form-check-label" for="allow_passwordless">
                        {{ trans('discord-login::admin.allow_passwordless') }}
                    </label>

                    <div class="form-text">{{ trans('discord-login::admin.allow_passwordless_help') }}</div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ trans('discord-login::admin.test.title') }}</h5>
            <p class="text-muted">{{ trans('discord-login::admin.test.description') }}</p>

            <form method="POST" action="{{ route('discord-login.admin.settings.test-credentials') }}" class="d-inline-block me-2">
                @csrf
                <button type="submit" class="btn btn-outline-primary">
                    <i class="bi bi-key"></i> {{ trans('discord-login::admin.test.credentials_button') }}
                </button>
            </form>

            <a href="{{ route('discord-login.admin.settings.test-callback', ['target' => 'login']) }}" class="btn btn-outline-primary me-2">
                <i class="bi bi-discord"></i> {{ trans('discord-login::admin.test.callback_button_login') }}
            </a>

            <a href="{{ route('discord-login.admin.settings.test-callback', ['target' => 'confirm']) }}" class="btn btn-outline-primary">
                <i class="bi bi-discord"></i> {{ trans('discord-login::admin.test.callback_button_confirm') }}
            </a>

            <div class="form-text mt-2">{{ trans('discord-login::admin.test.callback_help') }}</div>
        </div>
    </div>
@endsection
