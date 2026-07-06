@extends('layouts.app')

@section('title', __('messages.dashboard'))

@section('content')
    <div class="space-y-6">
        <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.28em] text-sky-400/70">{{ __('messages.dashboard') }}</p>
                    <h1 class="mt-3 text-3xl font-semibold text-white">{{ __('messages.business_console_title') }}</h1>
                    @if ($business)
                        <p class="mt-2 text-sm font-medium text-sky-300">{{ $business->name }}</p>
                    @endif
                    <p class="mt-3 max-w-2xl text-slate-400">{{ __('messages.dashboard_description') }}</p>
                </div>
                <div class="grid gap-3 sm:grid-cols-3 lg:grid-cols-5">
                    <a href="{{ route('products.index') }}" class="rounded-full bg-slate-800/80 px-5 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.products') }}</a>
                    <a href="{{ route('faqs.index') }}" class="rounded-full bg-slate-800/80 px-5 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.faqs') }}</a>
                    <a href="{{ route('pages.index') }}" class="rounded-full bg-slate-800/80 px-5 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.pages') }}</a>
                    <a href="{{ route('deliveries.index') }}" class="rounded-full bg-slate-800/80 px-5 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.delivery') }}</a>
                    <a href="{{ route('policies.index') }}" class="rounded-full bg-slate-800/80 px-5 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.policies') }}</a>
                </div>
            </div>
        </div>

        <div class="grid gap-6 xl:grid-cols-3">
            <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
                <h2 class="text-lg font-semibold text-white">{{ __('messages.business_summary') }}</h2>
                <dl class="mt-5 space-y-4 text-slate-300">
                    <div class="flex items-center justify-between rounded-2xl bg-white/5 px-4 py-3">
                        <dt>{{ __('messages.products') }}</dt>
                        <dd class="font-semibold text-white">{{ $stats['products'] ?? 0 }}</dd>
                    </div>
                    <div class="flex items-center justify-between rounded-2xl bg-white/5 px-4 py-3">
                        <dt>{{ __('messages.faqs') }}</dt>
                        <dd class="font-semibold text-white">{{ $stats['faqs'] ?? 0 }}</dd>
                    </div>
                    <div class="flex items-center justify-between rounded-2xl bg-white/5 px-4 py-3">
                        <dt>{{ __('messages.connected_pages') }}</dt>
                        <dd class="font-semibold text-white">{{ $stats['pages'] ?? 0 }}</dd>
                    </div>
                    <div class="flex items-center justify-between rounded-2xl bg-white/5 px-4 py-3">
                        <dt>{{ __('messages.delivery') }}</dt>
                        <dd class="font-semibold text-white">{{ $stats['deliveries'] ?? 0 }}</dd>
                    </div>
                    <div class="flex items-center justify-between rounded-2xl bg-white/5 px-4 py-3">
                        <dt>{{ __('messages.policies') }}</dt>
                        <dd class="font-semibold text-white">{{ $stats['policies'] ?? 0 }}</dd>
                    </div>
                    <div class="flex items-center justify-between rounded-2xl bg-white/5 px-4 py-3">
                        <dt>{{ __('messages.chat_records') }}</dt>
                        <dd class="font-semibold text-white">{{ $stats['chats'] ?? 0 }}</dd>
                    </div>
                </dl>
            </div>

            <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
                <h2 class="text-lg font-semibold text-white">{{ __('messages.subscription') }}</h2>
                <div class="mt-5 space-y-4 text-slate-300">
                    <div class="rounded-2xl bg-white/5 px-4 py-4">
                        <p class="text-sm uppercase tracking-[0.28em] text-slate-400">{{ __('messages.plan') }}</p>
                        <p class="mt-2 text-xl font-semibold text-white">{{ $business?->subscription_plan ?? __('messages.free') }}</p>
                    </div>
                    <div class="rounded-2xl bg-white/5 px-4 py-4">
                        <p class="text-sm uppercase tracking-[0.28em] text-slate-400">{{ __('messages.expires') }}</p>
                        <p class="mt-2 text-xl font-semibold text-white">{{ $business?->subscription_ends_at ? $business->subscription_ends_at->toFormattedDateString() : __('messages.no_expiry') }}</p>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
                <h2 class="text-lg font-semibold text-white">{{ __('messages.usage') }}</h2>
                <div class="mt-5 space-y-4 text-slate-300">
                    <div class="rounded-2xl bg-white/5 px-4 py-4">
                        <p class="text-sm uppercase tracking-[0.28em] text-slate-400">{{ __('messages.conversations') }}</p>
                        <p class="mt-2 text-xl font-semibold text-white">{{ $stats['usage_conversations'] ?? 0 }} / {{ $stats['plan_conversations'] ?? '∞' }}</p>
                    </div>
                    <div class="rounded-2xl bg-white/5 px-4 py-4">
                        <p class="text-sm uppercase tracking-[0.28em] text-slate-400">{{ __('messages.embeddings') }}</p>
                        <p class="mt-2 text-xl font-semibold text-white">{{ $stats['usage_embeddings'] ?? 0 }} / {{ $stats['plan_embeddings'] ?? '∞' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-white">{{ __('messages.quick_actions') }}</h2>
                    <p class="mt-2 text-slate-400">{{ __('messages.quick_actions_description') }}</p>
                </div>
                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 md:grid-cols-5">
                    <a href="{{ route('products.create') }}" class="rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-4 py-3 text-center text-sm font-semibold text-white transition hover:opacity-95">{{ __('messages.add_product') }}</a>
                    <a href="{{ route('faqs.create') }}" class="rounded-full bg-slate-800/80 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.add_faq') }}</a>
                    <a href="{{ route('pages.create') }}" class="rounded-full bg-slate-800/80 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.connect_page') }}</a>
                    <a href="{{ route('deliveries.create') }}" class="rounded-full bg-slate-800/80 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.add_delivery') }}</a>
                    <a href="{{ route('policies.create') }}" class="rounded-full bg-slate-800/80 px-4 py-3 text-center text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.add_policy') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
