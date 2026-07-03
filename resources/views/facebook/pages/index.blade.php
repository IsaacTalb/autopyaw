@extends('layouts.app')

@section('title', __('messages.facebook_pages'))

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.28em] text-sky-400/70">{{ __('messages.facebook_pages') }}</p>
                <h1 class="text-3xl font-semibold text-white">{{ __('messages.connected_pages') }}</h1>
                <p class="mt-2 text-slate-400">{{ __('messages.manage_pages_description') }}</p>
            </div>
            <a href="{{ route('pages.create') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white transition hover:opacity-95">{{ __('messages.connect_page') }}</a>
        </div>

        <div class="space-y-4">
            @forelse($pages as $page)
                <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <h2 class="text-xl font-semibold text-white">{{ $page->name }}</h2>
                            <p class="mt-2 text-slate-400">Page ID: {{ $page->page_id }}</p>
                            <p class="mt-1 text-slate-400">Subscribed: {{ $page->subscribed ? 'Yes' : 'No' }}</p>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('pages.edit', $page) }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-100 transition hover:bg-slate-900/80">{{ __('messages.edit') }}</a>
                            <form action="{{ route('pages.destroy', $page) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('messages.remove_page_confirmation') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full bg-rose-500/15 px-4 py-2 text-sm text-rose-200 transition hover:bg-rose-500/25">{{ __('messages.remove') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="rounded-3xl border border-dashed border-white/10 bg-slate-900/80 p-8 text-center text-slate-300">
                    {{ __('messages.no_pages_yet') }}
                </div>
            @endforelse
        </div>
    </div>
@endsection
