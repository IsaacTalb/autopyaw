@extends('layouts.app')

@section('title', __('messages.connect_facebook_page'))

@section('content')
    <div class="space-y-6">
        <div>
            <p class="text-sm uppercase tracking-[0.28em] text-sky-400/70">{{ __('messages.facebook_pages') }}</p>
            <h1 class="text-3xl font-semibold text-white">{{ __('messages.connect_facebook_page') }}</h1>
            <p class="mt-2 text-slate-400">{{ __('messages.connect_page_explanation') }}</p>
        </div>

        <form action="{{ route('pages.store') }}" method="POST" class="space-y-6 rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
            @csrf
            <div>
                <label for="page_id" class="block text-sm font-semibold text-slate-200">Page ID</label>
                <input id="page_id" name="page_id" type="text" value="{{ old('page_id') }}" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>
            </div>
            <div>
                <label for="name" class="block text-sm font-semibold text-slate-200">Page Name</label>
                <input id="name" name="name" type="text" value="{{ old('name') }}" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>
            </div>
            <div>
                <label for="access_token" class="block text-sm font-semibold text-slate-200">Long-lived Page Access Token</label>
                <textarea id="access_token" name="access_token" rows="4" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>{{ old('access_token') }}</textarea>
            </div>
            <div class="flex items-center gap-3">
                <input id="subscribed" name="subscribed" type="checkbox" value="1" class="h-4 w-4 rounded border-slate-500 bg-slate-900 text-sky-500 focus:ring-sky-500" {{ old('subscribed') ? 'checked' : '' }}>
                <label for="subscribed" class="text-sm text-slate-300">Subscribe this page to Messenger webhook events</label>
            </div>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('pages.index') }}" class="text-sm text-slate-300 transition hover:text-white">← {{ __('messages.back_to_pages') }}</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95">{{ __('messages.connect_page') }}</button>
            </div>
        </form>
    </div>
@endsection
