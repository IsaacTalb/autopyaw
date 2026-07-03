@extends('layouts.app')

@section('title', __('messages.app_name'))

@section('content')
    <div class="grid gap-10 lg:grid-cols-[1.2fr_0.8fr]">
        <section class="space-y-8 rounded-3xl border border-white/10 bg-slate-900/80 p-10 shadow-[0_60px_120px_-65px_rgba(0,0,0,0.8)] backdrop-blur-xl">
            <span class="inline-flex items-center gap-2 rounded-full bg-sky-500/10 px-4 py-2 text-sm font-semibold uppercase tracking-[0.3em] text-sky-300">{{ __('messages.private_beta') }}</span>
            <div class="space-y-5">
                <h1 class="text-5xl font-semibold text-white sm:text-6xl">{{ __('messages.hero_headline') }}</h1>
                <p class="max-w-3xl text-lg leading-8 text-slate-300">{{ __('messages.hero_subtitle') }}</p>
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-7 py-4 text-base font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95">{{ __('messages.start_beta') }}</a>
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center rounded-full border border-white/10 bg-white/5 px-7 py-4 text-base font-semibold text-slate-100 transition hover:bg-slate-800/80">{{ __('messages.view_dashboard') }}</a>
                </div>
            </div>
            <div class="grid gap-4 sm:grid-cols-3">
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">{{ __('messages.messenger_ai') }}</p>
                    <p class="mt-3 text-lg font-semibold text-white">{{ __('messages.auto_reply') }}</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">{{ __('messages.knowledge') }}</p>
                    <p class="mt-3 text-lg font-semibold text-white">{{ __('messages.upload_knowledge') }}</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-white/5 p-5">
                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">{{ __('messages.beta_ready') }}</p>
                    <p class="mt-3 text-lg font-semibold text-white">{{ __('messages.built_for_fast_launch') }}</p>
                </div>
            </div>
        </section>

        <section class="space-y-6 rounded-3xl border border-white/10 bg-slate-950/90 p-8 shadow-xl shadow-black/40">
            <div class="space-y-3">
                <h2 class="text-2xl font-semibold text-white">{{ __('messages.what_it_delivers') }}</h2>
                <p class="text-slate-400">{{ __('messages.what_it_delivers_body') }}</p>
            </div>
            <div class="space-y-4">
                <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-5">
                    <p class="font-semibold text-white">{{ __('messages.connect_pages') }}</p>
                    <p class="mt-2 text-slate-400">{{ __('messages.connect_pages_body') }}</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-5">
                    <p class="font-semibold text-white">{{ __('messages.upload_knowledge') }}</p>
                    <p class="mt-2 text-slate-400">{{ __('messages.upload_knowledge_body') }}</p>
                </div>
                <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-5">
                    <p class="font-semibold text-white">{{ __('messages.burmese_ai') }}</p>
                    <p class="mt-2 text-slate-400">{{ __('messages.burmese_ai_body') }}</p>
                </div>
            </div>
        </section>
    </div>
@endsection
