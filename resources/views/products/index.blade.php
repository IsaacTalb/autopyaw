@extends('layouts.app')

@section('title', 'Products')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm uppercase tracking-[0.28em] text-sky-400/70">Product Catalog</p>
                <h1 class="text-3xl font-semibold text-white">Products</h1>
                <p class="mt-2 text-slate-400">Create product entries used by the AI assistant and your Messenger commerce flow.</p>
            </div>
            <a href="{{ route('products.create') }}" class="inline-flex items-center justify-center rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-5 py-3 text-sm font-semibold text-white transition hover:opacity-95">Add Product</a>
        </div>

        <div class="overflow-hidden rounded-3xl border border-white/10 bg-slate-900/80 shadow-xl shadow-black/20">
            <table class="min-w-full divide-y divide-white/10 text-left text-sm text-slate-200">
                <thead class="bg-slate-950/90 text-slate-400">
                    <tr>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4">Stock</th>
                        <th class="px-6 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/10 bg-slate-900/80">
                    @forelse($products as $product)
                        <tr>
                            <td class="px-6 py-4">{{ $product->name }}</td>
                            <td class="px-6 py-4">{{ number_format($product->price, 2) }} MMK</td>
                            <td class="px-6 py-4">{{ $product->stock }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('products.edit', $product) }}" class="rounded-full border border-white/10 bg-white/5 px-3 py-2 text-sm text-slate-100 transition hover:bg-slate-800/80">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline" onsubmit="return confirm('Delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="rounded-full bg-rose-500/15 px-3 py-2 text-sm text-rose-200 transition hover:bg-rose-500/25">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-slate-400">No products found yet. Add your first product to power AI responses.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>{{ $products->links() }}</div>
    </div>
@endsection
