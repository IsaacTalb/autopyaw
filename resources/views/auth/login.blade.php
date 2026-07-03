@extends('layouts.app')

@section('title', __('messages.login_title'))

@section('content')
    <div class="mx-auto max-w-xl space-y-6 rounded-3xl border border-white/10 bg-slate-900/80 p-8 shadow-xl shadow-black/20">
        <div>
            <p class="text-sm uppercase tracking-[0.3em] text-sky-300">{{ __('messages.login_title') }}</p>
            <h1 class="mt-3 text-3xl font-semibold text-white">{{ __('messages.login_title') }}</h1>
            <p class="mt-2 text-slate-400">{{ __('messages.login_description') }}</p>
        </div>

        <form method="POST" action="{{ route('login.post') }}" class="space-y-5">
            @csrf

            @if ($errors->any())
                <div class="rounded-3xl border border-red-500/20 bg-red-500/10 p-4 text-sm text-red-200">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div>
                <label for="email" class="block text-sm font-semibold text-slate-200">{{ __('messages.email') }}</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" />
            </div>
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-200">{{ __('messages.password') }}</label>
                <input id="password" name="password" type="password" required class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" />
            </div>
            <button type="submit" class="inline-flex w-full items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95">{{ __('messages.login') }}</button>
        </form>
        <p class="text-sm text-slate-400">{{ __('messages.already_have_account') }} <a href="{{ route('register') }}" class="font-semibold text-white hover:text-sky-300">{{ __('messages.login_instead') }}</a>.</p>
    </div>
@endsection
