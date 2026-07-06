@extends('layouts.app')

@section('title', __('messages.policies'))

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.28em] text-amber-300/80">{{ __('messages.policies') }}</p>
                <h1 class="text-3xl font-semibold text-white">{{ __('messages.manage_policies') }}</h1>
                <p class="mt-2 max-w-2xl text-slate-400">{{ __('messages.manage_policies_description') }}</p>
            </div>
            <a href="{{ route('policies.create') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-amber-500 to-rose-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-amber-500/20 transition hover:scale-[1.02] hover:opacity-95">{{ __('messages.add_policy') }}</a>
        </div>

        <div class="grid gap-4">
            @forelse($policies as $policy)
                <div class="rounded-2xl border border-white/10 bg-slate-900/80 p-5 shadow-xl shadow-black/20 ring-1 ring-amber-400/10 transition hover:-translate-y-0.5 hover:border-amber-300/30">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-[0.22em] text-amber-300">{{ __('messages.title') }}</p>
                            <h2 class="mt-2 text-xl font-semibold text-white">{{ $policy->title }}</h2>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('policies.edit', $policy) }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-100 transition hover:border-amber-300/40 hover:bg-slate-800/80">{{ __('messages.edit') }}</a>
                            <form action="{{ route('policies.destroy', $policy) }}" method="POST" onsubmit="return confirm('{{ __('messages.delete_policy_confirmation') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full bg-rose-500/15 px-4 py-2 text-sm text-rose-200 transition hover:bg-rose-500/25">{{ __('messages.delete') }}</button>
                            </form>
                        </div>
                    </div>
                    <p class="mt-4 text-sm leading-6 text-slate-300">{{ $policy->content }}</p>
                </div>
            @empty
                <div class="rounded-2xl border border-dashed border-white/15 bg-slate-900/50 p-10 text-center text-slate-400">
                    {{ __('messages.no_policies_yet') }}
                </div>
            @endforelse
        </div>

        <div>{{ $policies->links() }}</div>
    </div>
@endsection
