@extends('layouts.app')

@section('title', __('messages.faqs'))

@section('content')
    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <p class="text-sm uppercase tracking-[0.24em] text-sky-300">{{ __('messages.knowledge_base') }}</p>
            <h1 class="mt-2 text-3xl font-semibold text-white">{{ __('messages.faqs') }}</h1>
            <p class="mt-2 max-w-2xl text-slate-400">{{ __('messages.manage_faqs_description') }}</p>
        </div>
        <a href="{{ route('faqs.create') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95">{{ __('messages.add_faq') }}</a>
    </div>

    <div class="space-y-4">
        @forelse($faqs as $faq)
            <div class="rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
                <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                    <div>
                        <h2 class="text-xl font-semibold text-white">{{ $faq->question }}</h2>
                        <p class="mt-2 text-slate-300">{{ Str::limit($faq->answer, 180) }}</p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('faqs.edit', $faq) }}" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm text-slate-100 transition hover:bg-slate-900">Edit</a>
                        <form action="{{ route('faqs.destroy', $faq) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('messages.delete_faq_confirmation') }}');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full bg-rose-500/15 px-4 py-2 text-sm text-rose-200 transition hover:bg-rose-500/25">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="rounded-3xl border border-dashed border-white/10 bg-slate-900/80 p-8 text-center text-slate-300">
                {{ __('messages.no_faqs_yet') }}
            </div>
        @endforelse
    </div>

    <div class="mt-8">{{ $faqs->links() }}</div>
@endsection
