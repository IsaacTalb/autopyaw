@extends('layouts.app')

@section('title', __('messages.create_delivery_title'))

@section('content')
    <div class="space-y-6">
        <div>
            <p class="text-sm uppercase tracking-[0.28em] text-emerald-300/80">{{ __('messages.delivery') }}</p>
            <h1 class="text-3xl font-semibold text-white">{{ __('messages.create_delivery_title') }}</h1>
            <p class="mt-2 max-w-2xl text-slate-400">{{ __('messages.create_delivery_description') }}</p>
        </div>

        <form action="{{ route('deliveries.store') }}" method="POST" class="space-y-6 rounded-2xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20 ring-1 ring-emerald-400/10">
            @csrf
            <div class="grid gap-6 lg:grid-cols-[1fr_220px]">
                <div>
                    <label for="type" class="block text-sm font-semibold text-slate-200">{{ __('messages.delivery_type') }}</label>
                    <input id="type" name="type" type="text" value="{{ old('type') }}" placeholder="{{ __('messages.delivery_type_placeholder') }}" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300/20" required>
                </div>
                <div>
                    <label for="cost" class="block text-sm font-semibold text-slate-200">{{ __('messages.delivery_cost_mmk') }}</label>
                    <input id="cost" name="cost" type="number" step="0.01" min="0" value="{{ old('cost', 0) }}" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300/20" required>
                </div>
            </div>
            <div>
                <label for="details" class="block text-sm font-semibold text-slate-200">{{ __('messages.delivery_details') }}</label>
                <textarea id="details" name="details" rows="6" placeholder="{{ __('messages.delivery_details_placeholder') }}" class="mt-2 w-full rounded-2xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-emerald-300 focus:ring-2 focus:ring-emerald-300/20">{{ old('details') }}</textarea>
            </div>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('deliveries.index') }}" class="text-sm text-slate-300 transition hover:text-white">← {{ __('messages.back_to_deliveries') }}</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-emerald-500 to-sky-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-emerald-500/20 transition hover:scale-[1.02] hover:opacity-95">{{ __('messages.save_delivery') }}</button>
            </div>
        </form>
    </div>
@endsection
