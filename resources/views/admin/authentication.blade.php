@extends('admin.layouts.admin')

@section('title', trans('discord-integration::admin.nav.authentication'))

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('discord-integration.admin.authentication.save') }}">
                @csrf

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="enabled" id="enabled" @checked($enabled)>

                    <label class="form-check-label" for="enabled">
                        {{ trans('discord-integration::admin.enabled') }}
                    </label>

                    <div class="form-text">{{ trans('discord-integration::admin.enabled_help') }}</div>
                </div>

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input @error('allow_duplicates') is-invalid @enderror" type="checkbox" name="allow_duplicates" id="allow_duplicates" @checked($allowDuplicates)>

                    <label class="form-check-label" for="allow_duplicates">
                        {{ trans('discord-integration::admin.allow_duplicates') }}
                    </label>

                    <div class="form-text">{{ trans('discord-integration::admin.allow_duplicates_help') }}</div>

                    @error('allow_duplicates')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="allow_passwordless" id="allow_passwordless" @checked($allowPasswordless)>

                    <label class="form-check-label" for="allow_passwordless">
                        {{ trans('discord-integration::admin.allow_passwordless') }}
                    </label>

                    <div class="form-text">{{ trans('discord-integration::admin.allow_passwordless_help') }}</div>
                </div>

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input @error('customizable_email') is-invalid @enderror" type="checkbox" name="customizable_email" id="customizable_email" @checked($customizableEmail)>

                    <label class="form-check-label" for="customizable_email">
                        {{ trans('discord-integration::admin.customizable_email') }}
                    </label>

                    <div class="form-text">{{ trans('discord-integration::admin.customizable_email_help') }}</div>

                    @error('customizable_email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="match_by_email" id="match_by_email" @checked($matchByEmail)>

                    <label class="form-check-label" for="match_by_email">
                        {{ trans('discord-integration::admin.match_by_email') }}
                    </label>

                    <div class="form-text">{{ trans('discord-integration::admin.match_by_email_help') }}</div>
                </div>

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="sync_avatar" id="sync_avatar" @checked($syncAvatar)>

                    <label class="form-check-label" for="sync_avatar">
                        {{ trans('discord-integration::admin.sync_avatar') }}
                    </label>

                    <div class="form-text">{{ trans('discord-integration::admin.sync_avatar_help') }}</div>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="requiredGuildId">{{ trans('discord-integration::admin.required_guild') }}</label>
                    <div class="form-text mb-2">{{ trans('discord-integration::admin.required_guild_help') }}</div>

                    @if($guilds !== null)
                        <select class="form-select @error('required_guild_id') is-invalid @enderror" id="requiredGuildId" name="required_guild_id">
                            <option value="">{{ trans('discord-integration::admin.no_required_guild') }}</option>

                            @foreach($guilds as $guild)
                                <option value="{{ $guild['id'] }}" @selected(old('required_guild_id', $requiredGuildId) == $guild['id'])>{{ $guild['name'] }}</option>
                            @endforeach

                            @if($requiredGuildId && ! collect($guilds)->contains('id', $requiredGuildId))
                                <option value="{{ $requiredGuildId }}" selected>{{ trans('discord-integration::admin.unknown_guild', ['id' => $requiredGuildId]) }}</option>
                            @endif
                        </select>
                    @else
                        <input type="text" class="form-control @error('required_guild_id') is-invalid @enderror" id="requiredGuildId" name="required_guild_id" value="{{ old('required_guild_id', $requiredGuildId) }}">
                    @endif

                    @error('required_guild_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3 form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="bypass_maintenance" id="bypass_maintenance" @checked($bypassMaintenance)>

                    <label class="form-check-label" for="bypass_maintenance">
                        {{ trans('discord-integration::admin.bypass_maintenance') }}
                    </label>

                    <div class="form-text">{{ trans('discord-integration::admin.bypass_maintenance_help') }}</div>
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
                        {{ trans('discord-integration::admin.email_warning.title') }}
                    </h5>
                </div>
                <div class="modal-body">
                    <p>{{ trans('discord-integration::admin.email_warning.body') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="emailMatchCancel">
                        {{ trans('messages.actions.cancel') }}
                    </button>
                    <button type="button" class="btn btn-danger" id="emailMatchConfirm" disabled>
                        {{ trans('discord-integration::admin.email_warning.confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('footer-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const matchByEmail = document.getElementById('match_by_email');
            const allowDuplicates = document.getElementById('allow_duplicates');
            const customizableEmail = document.getElementById('customizable_email');
            const modalElement = document.getElementById('emailMatchWarningModal');
            const modal = new bootstrap.Modal(modalElement);
            const confirmButton = document.getElementById('emailMatchConfirm');
            const confirmLabel = confirmButton.textContent.trim();
            let countdownTimer = null;

            // allow_duplicates and customizable_email are kept mutually exclusive
            // with match_by_email (see Admin\AuthenticationController::save()), so
            // enabling either of them here turns match_by_email back off instead
            // of letting an invalid combination reach the server.
            [allowDuplicates, customizableEmail].forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    if (checkbox.checked) {
                        matchByEmail.checked = false;
                    }
                });
            });

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
                allowDuplicates.checked = false;
                customizableEmail.checked = false;
                modal.hide();
            });

            modalElement.addEventListener('hidden.bs.modal', function () {
                clearInterval(countdownTimer);
            });
        });
    </script>
@endpush
