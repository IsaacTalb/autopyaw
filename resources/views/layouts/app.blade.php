<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950 text-slate-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', __('messages.app_name')) - {{ __('messages.app_name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-indigo-500 selection:text-white">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(99,102,241,0.18),transparent_24%),radial-gradient(circle_at_100%_20%,_rgba(56,189,248,0.18),transparent_22%),linear-gradient(180deg,_#020617,_#0f172a)]">
        <header class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/95 backdrop-blur-lg">
            <div class="mx-auto flex max-w-7xl flex-col gap-3 px-3 py-3 xs:px-4 xs:py-4 sm:flex-row sm:items-center sm:justify-between sm:gap-4 sm:px-6 lg:px-8">
                {{-- Logo row with hamburger --}}
                <div class="flex items-center gap-2 xs:gap-3">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-2 xs:gap-3 rounded-2xl xs:rounded-3xl border border-white/10 bg-white/5 px-3 xs:px-4 py-1.5 xs:py-2 text-sm xs:text-base font-semibold text-white shadow-[0_0_0_1px_rgba(255,255,255,0.03)] transition hover:border-indigo-400/30 hover:bg-slate-900/80">
                        <span class="inline-flex h-8 w-8 xs:h-10 xs:w-10 items-center justify-center rounded-xl xs:rounded-2xl bg-gradient-to-br from-indigo-500 via-violet-500 to-sky-400 text-xs xs:text-sm font-bold text-white shadow-lg shadow-indigo-500/20">A</span>
                        <span class="hidden xs:inline">AutoPyaw</span>
                        <span class="inline xs:hidden">Auto</span>
                    </a>

                    {{-- Desktop nav --}}
                    <nav class="hidden items-center gap-1 text-sm text-slate-300 md:flex lg:gap-2">
                        <a href="{{ route('dashboard') }}" class="rounded-full px-2 lg:px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.dashboard') }}</a>
                        <a href="{{ route('products.index') }}" class="rounded-full px-2 lg:px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.products') }}</a>
                        <a href="{{ route('faqs.index') }}" class="rounded-full px-2 lg:px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.faqs') }}</a>
                        <a href="{{ route('pages.index') }}" class="rounded-full px-2 lg:px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.pages') }}</a>
                        <a href="{{ route('deliveries.index') }}" class="rounded-full px-2 lg:px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.delivery') }}</a>
                        <a href="{{ route('policies.index') }}" class="rounded-full px-2 lg:px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.policies') }}</a>
                    </nav>

                    {{-- Mobile hamburger --}}
                    <details class="relative group md:hidden">
                        <summary class="inline-flex items-center justify-center rounded-full border border-white/10 bg-slate-900/80 p-2 text-slate-300 transition hover:border-indigo-400/30 hover:bg-slate-900/80 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
                            <svg class="size-5 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </summary>
                        <div class="absolute left-0 top-full mt-2 w-56 origin-top-left scale-95 transform rounded-xl border border-white/10 bg-slate-900/95 p-2 opacity-0 shadow-2xl shadow-black/50 backdrop-blur-xl transition-all duration-200 ease-out pointer-events-none group-open:scale-100 group-open:opacity-100 group-open:pointer-events-auto z-50">
                            <div class="flex flex-col gap-1">
                                <a href="{{ route('dashboard') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.dashboard') }}</a>
                                <a href="{{ route('products.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.products') }}</a>
                                <a href="{{ route('faqs.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.faqs') }}</a>
                                <a href="{{ route('pages.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.pages') }}</a>
                                <a href="{{ route('deliveries.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.delivery') }}</a>
                                <a href="{{ route('policies.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.policies') }}</a>
                            </div>
                        </div>
                    </details>
                </div>

                {{-- Right section: lang + hamburger (mobile) --}}
                <div class="flex flex-wrap items-center gap-2 xs:gap-3">
                    @php
                        $currentQuery = request()->except('locale');
                        $localeBase = url()->current();
                        $localeQuery = fn ($locale) => $localeBase.'?'.http_build_query(array_merge($currentQuery, ['locale' => $locale]));
                    @endphp
                    <!-- Language selector -->
                    <details class="relative group">
                        <summary class="inline-flex items-center gap-1.5 xs:gap-2 rounded-full border border-white/10 bg-slate-900/80 px-2.5 xs:px-3 py-2 xs:py-2 text-xs xs:text-sm text-slate-300 transition hover:border-indigo-400/30 hover:bg-slate-900/80 cursor-pointer list-none [&::-webkit-details-marker]:hidden min-h-[36px]">
                            @if(app()->getLocale() === 'my')
                                <img src="{{ asset('assets/lang-icon/Flag_of_Myanmar.svg') }}" alt="MY" class="inline-block h-4 w-6 xs:h-5 xs:w-8 rounded-sm object-cover">
                                <span class="text-slate-200 text-xs xs:text-sm">MY</span>
                            @else
                                <img src="{{ asset('assets/lang-icon/Flag_of_the_United_States.svg') }}" alt="EN" class="inline-block h-4 w-6 xs:h-5 xs:w-8 rounded-sm object-cover">
                                <span class="text-slate-200 text-xs xs:text-sm">EN</span>
                            @endif
                            <svg class="size-3 xs:size-3.5 text-slate-400 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </summary>
                        <div class="absolute right-0 top-full mt-2 w-44 xs:w-48 origin-top-right scale-95 transform rounded-xl border border-white/10 bg-slate-900/95 p-1.5 opacity-0 shadow-2xl shadow-black/50 backdrop-blur-xl transition-all duration-200 ease-out pointer-events-none group-open:scale-100 group-open:opacity-100 group-open:pointer-events-auto z-50">
                            <a href="{{ $localeQuery('en') }}" class="flex items-center gap-3 rounded-lg px-3 xs:px-4 py-2.5 xs:py-2 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white{{ app()->getLocale() === 'en' ? ' bg-indigo-500/10 font-semibold text-white' : '' }}">
                                <img src="{{ asset('assets/lang-icon/Flag_of_the_United_States.svg') }}" alt="EN" class="inline-block h-5 w-6 xs:h-6 xs:w-8 rounded-sm object-cover">
                                <span>English</span>
                            </a>
                            <a href="{{ $localeQuery('my') }}" class="flex items-center gap-3 rounded-lg px-3 xs:px-4 py-2.5 xs:py-2 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white{{ app()->getLocale() === 'my' ? ' bg-indigo-500/10 font-semibold text-white' : '' }}">
                                <img src="{{ asset('assets/lang-icon/Flag_of_Myanmar.svg') }}" alt="MY" class="inline-block h-5 w-6 xs:h-6 xs:w-8 rounded-sm object-cover">
                                <span>မြန်မာ</span>
                            </a>
                        </div>
                    </details>
                    <!-- Mobile hamburger (includes nav + auth) -->
                    <details class="relative group md:hidden">
                        <summary class="inline-flex items-center justify-center rounded-full border border-white/10 bg-slate-900/80 p-2 text-slate-300 transition hover:border-indigo-400/30 hover:bg-slate-900/80 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
                            <svg class="size-5 transition-transform group-open:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        </summary>
                        <div class="absolute left-0 top-full mt-2 w-56 origin-top-left scale-95 transform rounded-xl border border-white/10 bg-slate-900/95 p-2 opacity-0 shadow-2xl shadow-black/50 backdrop-blur-xl transition-all duration-200 ease-out pointer-events-none group-open:scale-100 group-open:opacity-100 group-open:pointer-events-auto z-50">
                            <div class="flex flex-col gap-1">
                                <a href="{{ route('dashboard') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.dashboard') }}</a>
                                <a href="{{ route('products.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.products') }}</a>
                                <a href="{{ route('faqs.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.faqs') }}</a>
                                <a href="{{ route('pages.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.pages') }}</a>
                                <a href="{{ route('deliveries.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.delivery') }}</a>
                                <a href="{{ route('policies.index') }}" class="rounded-lg px-4 py-3 text-sm text-slate-300 transition hover:bg-indigo-500/20 hover:text-white">{{ __('messages.policies') }}</a>
                                @auth
                                    <span class="rounded-full border border-white/10 bg-slate-900/80 px-3 xs:px-4 py-2 text-xs xs:text-sm text-slate-300 truncate max-w-[120px] xs:max-w-[180px]">{{ __('messages.hello', ['name' => auth()->user()->name]) }}</span>
                                    <form method="POST" action="{{ route('logout') }}" class="inline">
                                        @csrf
                                        <button type="submit" class="rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-3 xs:px-4 py-2 text-xs xs:text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95 min-h-[36px]">{{ __('messages.logout') }}</button>
                                    </form>
                                @else
                                    <a href="{{ route('auth.login') }}" class="rounded-full border border-white/10 bg-white/5 px-3 xs:px-4 py-2 text-xs xs:text-sm font-semibold text-white transition hover:bg-slate-900/80 inline-flex items-center">{{ __('messages.login') }}</a>
                                    <a href="{{ route('auth.login') }}" class="rounded-full bg-slate-800/80 px-3 xs:px-4 py-2 text-xs xs:text-sm font-semibold text-white transition hover:bg-slate-700/80 inline-flex items-center">{{ __('messages.register') }}</a>
                                @endauth
                            </div>
                        </div>
                    </details>
                </div>

            </div>
        </header>

        <main class="py-4 xs:py-6 sm:py-8">
            <div class="mx-auto max-w-7xl px-3 xs:px-4 sm:px-6 lg:px-8">
                @include('partials.flash')
                @yield('content')
            </div>
        </main>

        <footer class="border-t border-white/10 bg-slate-950/95 py-4 xs:py-6">
            <div class="mx-auto flex max-w-7xl flex-col gap-3 px-3 xs:px-4 text-xs xs:text-sm text-slate-400 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <p class="text-center sm:text-left">© {{ date('Y') }} {{ __('messages.app_name') }}. AI Facebook Messenger Assistant for Myanmar businesses.</p>
                <p class="text-center sm:text-right">{{ __('messages.sign_out_project') }}</p>
            </div>
        </footer>
    </div>
</body>
</html>
