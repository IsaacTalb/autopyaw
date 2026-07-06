@extends('layouts.app')

@section('title', __('messages.delivery'))

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.28em] text-emerald-300/80">{{ __('messages.delivery') }}</p>
                <h1 class="text-3xl font-semibold text-white">{{ __('messages.manage_deliveries') }}</h1>
                <p class="mt-2 max-w-2xl text-slate-400">{{ __('messages.manage_deliveries_description') }}</p>
            </div>
            <a href="{{ route('deliveries.create') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-emerald-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:scale-[1.02] hover:opacity-95">{{ __('messages.add_delivery') }}</a>
        </div>

        <div class="grid gap-4 lg:grid-cols-2">
            @forelse($deliveries as $delivery)
                <div class="rounded-2xl border border-white/10 bg-slate-900/80 p-5 shadow-xl shadow-black/20 ring-1 ring-emerald-400/10 transition hover:-translate-y-0.5 hover:border-emerald-300/30">
                    <div class="flex items-start justify-between gap-4">
                        <div>
                            <p class="text-xs uppercase tracking-[0.22em] text-emerald-300">{{ __('messages.type') }}</p>
                            <h2 class="mt-2 text-xl font-semibold text-white">{{ $delivery->type }}</h2>
                        </div>
                        <span class="rounded-full bg-emerald-500/15 px-3 py-1 text-sm font-semibold text-emerald-100">{{ number_format($delivery->cost, 2) }} MMK</span>
                    </div>
                    <p class="mt-4 min-h-12 text-sm leading-6 text-slate-300">{{ $delivery->details ?: '-' }}</p>
                    <div class="mt-5 flex flex-wrap gap-2">
                        <a href="{{ route('deliveries.edit', $delivery) }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-100 transition hover:border-emerald-300/40 hover:bg-slate-800/80">{{ __('messages.edit') }}</a>
                        <form action="{{ route('deliveries.destroy', $delivery) }}" method="POST" onsubmit="return confirm('{{ __('messages.delete_delivery_confirmation') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full bg-rose-500/15 px-4 py-2 text-sm text-rose-200 transition hover:bg-rose-500/25">{{ __('messages.delete') }}</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-white/15 bg-slate-900/50 p-10 text-center text-slate-400 lg:col-span-2">
                    {{ __('messages.no_deliveries_yet') }}
                </div>
            @endforelse
        </div>

        <div>{{ $deliveries->links() }}</div>
    </div>
@endsection
