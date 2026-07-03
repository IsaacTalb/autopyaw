@extends('layouts.app')

@section('title', 'Edit FAQ')

@section('content')
    <div class="space-y-6">
        <div>
            <p class="text-sm uppercase tracking-[0.24em] text-sky-300">{{ __('messages.knowledge_base') }}</p>
            <h1 class="mt-2 text-3xl font-semibold text-white">{{ __('messages.edit_faq_title') }}</h1>
            <p class="mt-2 text-slate-400">{{ __('messages.edit_faq_description') }}</p>
        </div>

        <form action="{{ route('faqs.update', $faq) }}" method="POST" class="space-y-6 rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
            @csrf
            @method('PUT')
            <div>
                <label for="question" class="block text-sm font-semibold text-slate-200">Question</label>
                <input id="question" name="question" type="text" value="{{ old('question', $faq->question) }}" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>
            </div>
            <div>
                <label for="answer" class="block text-sm font-semibold text-slate-200">Answer</label>
                <textarea id="answer" name="answer" rows="6" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>{{ old('answer', $faq->answer) }}</textarea>
            </div>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('faqs.index') }}" class="text-sm font-semibold text-slate-300 transition hover:text-white">← Back to FAQs</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95">Update FAQ</button>
            </div>
        </form>
    </div>
@endsection
