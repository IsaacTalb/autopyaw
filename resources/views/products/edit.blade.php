@extends('layouts.app')

@section('title', __('messages.edit_product_title'))

@section('content')
    <div class="space-y-6">
        <div>
            <p class="text-sm uppercase tracking-[0.28em] text-sky-400/70">{{ __('messages.product_catalog') }}</p>
            <h1 class="text-3xl font-semibold text-white">{{ __('messages.edit_product_title') }}</h1>
            <p class="mt-2 text-slate-400">{{ __('messages.edit_product_description') }}</p>
        </div>

        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6 rounded-3xl border border-white/10 bg-slate-900/80 p-6 shadow-xl shadow-black/20">
            @csrf
            @method('PUT')
            <div>
                <label for="name" class="block text-sm font-semibold text-slate-200">{{ __('messages.product_name') }}</label>
                <input id="name" name="name" type="text" value="{{ old('name', $product->name) }}" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>
            </div>
            <div>
                <label for="slug" class="block text-sm font-semibold text-slate-200">{{ __('messages.slug') }}</label>
                <input id="slug" name="slug" type="text" value="{{ old('slug', $product->slug) }}" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>
            </div>
            <div>
                <label for="description" class="block text-sm font-semibold text-slate-200">{{ __('messages.description') }}</label>
                <textarea id="description" name="description" rows="5" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20">{{ old('description', $product->description) }}</textarea>
            </div>
            <div class="grid gap-6 lg:grid-cols-2">
                <div>
                    <label for="price" class="block text-sm font-semibold text-slate-200">{{ __('messages.price_mmk') }}</label>
                    <input id="price" name="price" type="number" step="0.01" value="{{ old('price', $product->price) }}" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>
                </div>
                <div>
                    <label for="stock" class="block text-sm font-semibold text-slate-200">{{ __('messages.stock') }}</label>
                    <input id="stock" name="stock" type="number" value="{{ old('stock', $product->stock) }}" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none transition focus:border-indigo-400 focus:ring-2 focus:ring-indigo-400/20" required>
                </div>
            </div>
            <div>
                <label for="image" class="block text-sm font-semibold text-slate-200">{{ __('messages.product_image_optional') }}</label>
                <input id="image" name="image" type="file" accept="image/*" class="mt-2 w-full rounded-3xl border border-white/10 bg-slate-950/90 px-4 py-3 text-slate-100 outline-none" />
            </div>
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <a href="{{ route('products.index') }}" class="text-sm text-slate-300 transition hover:text-white">← {{ __('messages.back_to_products') }}</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95">{{ __('messages.update_product') }}</button>
            </div>
        </form>
    </div>
@endsection
