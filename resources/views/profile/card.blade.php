<p>{{ trans('discord-login::messages.profile.linked_as', ['name' => $discordAccount->name]) }}</p>

@if($showBypass2fa)
    <form method="POST" action="{{ route('discord-login.bypass-2fa') }}" class="mb-3">
        @csrf
        <input type="hidden" name="bypass_2fa" value="0">

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="bypass_2fa" id="bypass_2fa" value="1" onchange="this.form.submit()" @checked($discordAccount->bypass_2fa)>

            <label class="form-check-label" for="bypass_2fa">
                {{ trans('discord-login::messages.profile.bypass_2fa') }}
            </label>
        </div>
    </form>
@endif

@if(! $discordAccount->has_custom_password)
    <form method="POST" action="{{ route('discord-login.set-password') }}">
        @csrf

        <p class="text-muted">{{ trans('discord-login::messages.profile.no_password') }}</p>

        <div class="mb-2">
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ trans('auth.password') }}" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-2">
            <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('auth.confirm_password') }}" required autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary btn-sm">
            {{ trans('discord-login::messages.profile.set_password') }}
        </button>
    </form>
@endif
