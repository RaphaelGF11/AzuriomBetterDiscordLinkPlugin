@extends('layouts.app')

@section('title', trans('discord-integration::messages.conflict.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-6">
        <h1>{{ trans('discord-integration::messages.conflict.title') }}</h1>

        <div class="alert alert-warning">
            <i class="bi bi-exclamation-triangle"></i> {{ trans('discord-integration::messages.conflict.already_linked') }}
        </div>

        <div class="card">
            <div class="card-body d-grid gap-2">
                <form method="POST" action="{{ route('discord-integration.conflict.login') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100">
                        {{ trans('discord-integration::messages.conflict.login') }}
                    </button>
                </form>

                @if($allowDuplicates)
                    <form method="POST" action="{{ route('discord-integration.conflict.register') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary w-100">
                            {{ trans('discord-integration::messages.conflict.register') }}
                        </button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
