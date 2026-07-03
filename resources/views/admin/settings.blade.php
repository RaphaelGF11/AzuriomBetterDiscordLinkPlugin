@extends('admin.layouts.admin')

@section('title', 'Discord Login')

@section('content')
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

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </form>
        </div>
    </div>
@endsection
