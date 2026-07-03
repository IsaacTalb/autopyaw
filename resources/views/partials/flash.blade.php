@if(session('success'))
    <div class="mb-6 rounded-3xl border border-emerald-500/20 bg-emerald-500/10 p-4 text-sm text-emerald-100 shadow-lg shadow-emerald-500/10">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="mb-6 rounded-3xl border border-rose-500/20 bg-rose-500/10 p-4 text-sm text-rose-100 shadow-lg shadow-rose-500/10">
        <p class="font-semibold">There were some issues with your submission:</p>
        <ul class="mt-2 list-disc space-y-1 pl-5 text-slate-200">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
