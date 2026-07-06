@extends('layouts.app')

@section('title', __('messages.products'))

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.28em] text-sky-400/70">{{ __('messages.product_catalog') }}</p>
                <h1 class="text-3xl font-semibold text-white">{{ __('messages.products') }}</h1>
                <p class="mt-2 text-slate-400">{{ __('messages.manage_products_description') }}</p>
            </div>
            <a href="{{ route('products.create') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white transition hover:scale-[1.02] hover:opacity-95">{{ __('messages.add_product') }}</a>
        </div>

        <div class="overflow-hidden rounded-2xl border border-white/10 bg-slate-900/80 shadow-xl shadow-black/20 ring-1 ring-sky-400/10">
            <table class="min-w-full divide-y divide-white/10 text-left text-sm text-slate-200">
                <thead class="bg-slate-950/90 text-slate-400">
                    <tr>
                        <th class="px-6 py-4">{{ __('messages.name') }}</th>
                        <th class="px-6 py-4">{{ __('messages.price') }}</th>
                        <th class="px-6 py-4">{{ __('messages.stock') }}</th>
                        <th class="px-6 py-4">{{ __('messages.actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10 bg-slate-900/80">
                    @forelse($products as $product)
                        <tr class="transition hover:bg-white/[0.03]">
                            <td class="px-6 py-4">
                                <div class="font-semibold text-white">{{ $product->name }}</div>
                                <div class="mt-1 text-xs text-slate-500">{{ $product->slug }}</div>
                            </td>
                            <td class="px-6 py-4">{{ number_format($product->price, 2) }} MMK</td>
                            <td class="px-6 py-4">{{ $product->stock }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('products.edit', $product) }}" class="rounded-full border border-white/10 bg-white/5 px-3 py-2 text-sm text-slate-100 transition hover:border-sky-400/40 hover:bg-slate-800/80">{{ __('messages.edit') }}</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('messages.delete') }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full bg-rose-500/15 px-3 py-2 text-sm text-rose-200 transition hover:bg-rose-500/25">{{ __('messages.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400">{{ __('messages.no_products_yet') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>{{ $products->links() }}</div>
    </div>
@endsection
