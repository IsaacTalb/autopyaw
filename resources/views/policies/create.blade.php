@extends('layouts.app')

@section('title', __('messages.create_policy_title'))

@section('content')
    <div class="space-y-6">
        <div>
            <p class="text-sm uppercase tracking-[0.28em] text-amber-300/80">{{ __('messages.policies') }}</p>
            <h1 class="text-3xl font-semibold text-white">{{ __('messages.create_policy_title') }}</h1>
            <p class="mt-2 max-w-2xl text-slate-400">{{ __('messages.create_policy_description') }}</p>
        </div>

        <form action="{{ route('policies.store') }}" method="POST" class="space-y-6 rounded-2xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20 ring-1 ring-amber-400/10">
            @csrf
            <div>
                <label for="title" class="block text-sm font-semibold text-slate-200">{{ __('messages.policy_title') }}</label>
                <input id="title" name="title" type="text" value="{{ old('title') }}" placeholder="{{ __('messages.policy_title_placeholder') }}" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-amber-300 focus:ring-2 focus:ring-amber-300/20" required>
            </div>
            <div>
                <label for="content" class="block text-sm font-semibold text-slate-200">{{ __('messages.policy_content') }}</label>
                <textarea id="content" name="content" rows="8" placeholder="{{ __('messages.policy_content_placeholder') }}" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-amber-300 focus:ring-2 focus:ring-amber-300/20" required>{{ old('content') }}</textarea>
            </div>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('policies.index') }}" class="text-sm text-slate-300 transition hover:text-white">← {{ __('messages.back_to_policies') }}</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-amber-500 to-rose-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-amber-500/20 transition hover:scale-[1.02] hover:opacity-95">{{ __('messages.save_policy') }}</button>
            </div>
        </form>
    </div>
@endsection
