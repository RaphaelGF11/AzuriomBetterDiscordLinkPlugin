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

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="use_custom_credentials" id="use_custom_credentials" @checked($useCustomCredentials)>

                    <label class="form-check-label" for="use_custom_credentials">
                        {{ trans('discord-login::admin.custom_credentials') }}
                    </label>

                    <div class="form-text">{{ trans('discord-login::admin.custom_credentials_help') }}</div>
                </div>

                <div id="customCredentialsFields" @class(['row', 'd-none' => ! $useCustomCredentials && ! old('use_custom_credentials')])>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="clientId">{{ trans('admin.roles.discord.client_id') }}</label>
                        <input type="text" class="form-control @error('client_id') is-invalid @enderror" id="clientId" name="client_id" value="{{ old('client_id', $customClientId) }}">

                        @error('client_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="clientSecret">{{ trans('admin.roles.discord.client_secret') }}</label>
                        <input type="text" class="form-control @error('client_secret') is-invalid @enderror" id="clientSecret" name="client_secret" value="{{ old('client_secret', $customClientSecret) }}">

                        @error('client_secret')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="match_by_email" id="match_by_email" @checked($matchByEmail)>

                    <label class="form-check-label" for="match_by_email">
                        {{ trans('discord-login::admin.match_by_email') }}
                    </label>

                    <div class="form-text">{{ trans('discord-login::admin.match_by_email_help') }}</div>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>

    <div class="modal fade" id="emailMatchWarningModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">
                        <i class="bi bi-exclamation-triangle"></i>
                        {{ trans('discord-login::admin.email_warning.title') }}
                    </h5>
                </div>
                <div class="modal-body">
                    <p>{{ trans('discord-login::admin.email_warning.body') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="emailMatchCancel">
                        {{ trans('messages.actions.cancel') }}
                    </button>
                    <button type="button" class="btn btn-danger" id="emailMatchConfirm" disabled>
                        {{ trans('discord-login::admin.email_warning.confirm') }}
                    </button>
                </div>
            </div>
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

@push('footer-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const customCredentials = document.getElementById('use_custom_credentials');
            const credentialsFields = document.getElementById('customCredentialsFields');

            customCredentials.addEventListener('change', function () {
                credentialsFields.classList.toggle('d-none', !customCredentials.checked);
            });

            const matchByEmail = document.getElementById('match_by_email');
            const modalElement = document.getElementById('emailMatchWarningModal');
            const modal = new bootstrap.Modal(modalElement);
            const confirmButton = document.getElementById('emailMatchConfirm');
            const confirmLabel = confirmButton.textContent.trim();
            let countdownTimer = null;

            matchByEmail.addEventListener('change', function () {
                if (!matchByEmail.checked) {
                    return; // disabling never needs a warning
                }

                matchByEmail.checked = false;

                let remaining = 5;
                confirmButton.disabled = true;
                confirmButton.textContent = confirmLabel + ' (' + remaining + ')';

                clearInterval(countdownTimer);
                countdownTimer = setInterval(function () {
                    remaining--;

                    if (remaining <= 0) {
                        clearInterval(countdownTimer);
                        confirmButton.disabled = false;
                        confirmButton.textContent = confirmLabel;
                    } else {
                        confirmButton.textContent = confirmLabel + ' (' + remaining + ')';
                    }
                }, 1000);

                modal.show();
            });

            confirmButton.addEventListener('click', function () {
                matchByEmail.checked = true;
                modal.hide();
            });

            modalElement.addEventListener('hidden.bs.modal', function () {
                clearInterval(countdownTimer);
            });
        });
    </script>
@endpush
