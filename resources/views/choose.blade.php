@extends('layouts.app')

@section('title', trans('discord-login::messages.choose.title'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9 col-lg-6">
        <h1>{{ trans('discord-login::messages.choose.title') }}</h1>

        <p>{{ trans('discord-login::messages.choose.description') }}</p>

        <div class="card">
            <div class="card-body">
                @foreach($users as $user)
                    <form method="POST" action="{{ route('discord-login.choose') }}" class="mb-2">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <button type="submit" class="btn btn-outline-primary d-flex align-items-center gap-2 w-100">
                            <img src="{{ $user->getAvatar(32) }}" class="rounded" width="32" height="32" alt="{{ $user->name }}">
                            {{ $user->name }}
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
