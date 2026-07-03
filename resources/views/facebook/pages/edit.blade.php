@extends('layouts.app')

@section('title', __('messages.edit_page_title'))

@section('content')
    <div class="space-y-6">
        <div>
            <p class="text-sm uppercase tracking-[0.28em] text-sky-400/70">{{ __('messages.facebook_pages') }}</p>
            <h1 class="text-3xl font-semibold text-white">{{ __('messages.edit_page_title') }}</h1>
            <p class="mt-2 text-slate-400">{{ __('messages.edit_page_description') }}</p>
        </div>

        <form action="{{ route('pages.update', $page) }}" method="POST" class="space-y-6 rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-semibold text-slate-200">{{ __('messages.page_name') }}</label>
                <input id="name" name="name" type="text" value="{{ old('name', $page->name) }}" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-200">{{ __('messages.page_id_label') }}</label>
                <div class="mt-2 rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-300">{{ $page->page_id }}</div>
            </div>
            <div>
                <label for="access_token" class="block text-sm font-semibold text-slate-200">{{ __('messages.page_access_token') }}</label>
                <textarea id="access_token" name="access_token" rows="4" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20">{{ old('access_token') }}</textarea>
                <p class="mt-2 text-sm text-slate-500">{{ __('messages.replace_token_note') }}</p>
            </div>
            <div class="flex items-center gap-3">
                <input id="subscribed" name="subscribed" type="checkbox" value="1" class="h-4 w-4 rounded border-slate-500 bg-slate-900 text-sky-500 focus:ring-sky-500" {{ old('subscribed', $page->subscribed) ? 'checked' : '' }}>
                <label for="subscribed" class="text-sm text-slate-300">{{ __('messages.subscribe_page') }}</label>
            </div>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('pages.index') }}" class="text-sm text-slate-300 transition hover:text-white">← {{ __('messages.back_to_pages') }}</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95">{{ __('messages.save_changes') }}</button>
            </div>
        </form>
    </div>
@endsection
