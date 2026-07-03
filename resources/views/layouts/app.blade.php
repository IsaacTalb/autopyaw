<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-slate-950 text-slate-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@stack('title', __('messages.app_name')) – {{ __('messages.app_name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-full bg-slate-950 text-slate-100 antialiased selection:bg-indigo-500 selection:text-white">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top,_rgba(99,102,241,0.18),transparent_24%),radial-gradient(circle_at_100%_20%,_rgba(56,189,248,0.18),transparent_22%),linear-gradient(180deg,_#020617,_#0f172a)]">
        <header class="sticky top-0 z-50 border-b border-white/10 bg-slate-950/95 backdrop-blur-lg">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 py-4 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <div class="flex items-center gap-3">
                    <a href="{{ route('home') }}" class="inline-flex items-center gap-3 rounded-3xl border border-white/10 bg-white/5 px-4 py-2 text-base font-semibold text-white shadow-[0_0_0_1px_rgba(255,255,255,0.03)] transition hover:border-indigo-400/30 hover:bg-slate-900/80">
                        <span class="inline-flex h-10 w-10 items-center justify-center rounded-2xl bg-gradient-to-br from-indigo-500 via-violet-500 to-sky-400 text-sm font-bold text-white shadow-lg shadow-indigo-500/20">A</span>
                        AutoPyaw
                    </a>
                    <nav class="hidden items-center gap-2 text-sm text-slate-300 md:flex">
                        <a href="{{ route('dashboard') }}" class="rounded-full px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.dashboard') }}</a>
                        <a href="{{ route('products.index') }}" class="rounded-full px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.products') }}</a>
                        <a href="{{ route('faqs.index') }}" class="rounded-full px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.faqs') }}</a>
                        <a href="{{ route('pages.index') }}" class="rounded-full px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.pages') }}</a>
                        <a href="{{ route('deliveries.index') }}" class="rounded-full px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.delivery') }}</a>
                        <a href="{{ route('policies.index') }}" class="rounded-full px-3 py-2 transition hover:bg-slate-900/80 hover:text-white">{{ __('messages.policies') }}</a>
                    </nav>
                </div>
                <div class="flex flex-col items-start gap-3 sm:items-end sm:flex-row sm:gap-4">
                    @php
                        $currentQuery = request()->except('locale');
                        $localeBase = url()->current();
                        $localeQuery = fn ($locale) => $localeBase.'?'.http_build_query(array_merge($currentQuery, ['locale' => $locale]));
                    @endphp
                    <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-slate-900/80 px-3 py-2 text-sm text-slate-300">
                        <span class="text-slate-400">{{ __('messages.local_auth') }}</span>
                        <a href="{{ $localeQuery('en') }}" class="text-slate-200 hover:text-white{{ app()->getLocale() === 'en' ? ' font-semibold' : '' }}">EN</a>
                        <a href="{{ $localeQuery('my') }}" class="text-slate-200 hover:text-white{{ app()->getLocale() === 'my' ? ' font-semibold' : '' }}">MY</a>
                    </div>
                    @auth
                        <span class="rounded-full border border-white/10 bg-slate-900/80 px-4 py-2 text-sm text-slate-300">{{ __('messages.hello', ['name' => auth()->user()->name]) }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="rounded-full bg-gradient-to-r from-indigo-500 to-sky-500 px-4 py-2 text-sm font-semibold text-white shadow-lg shadow-indigo-500/20 transition hover:opacity-95">{{ __('messages.logout') }}</button>
                        </form>
                    @else
                        <div class="flex items-center gap-2">
                            <button type="button" onclick="openClerkSignIn()" class="rounded-full border border-white/10 bg-white/5 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-900/80">{{ __('messages.login') }}</button>
                            <button type="button" onclick="openClerkSignUp()" class="rounded-full bg-slate-800/80 px-4 py-2 text-sm font-semibold text-white transition hover:bg-slate-700/80">{{ __('messages.register') }}</button>
                            <a href="{{ route('login') }}" class="text-xs text-slate-400 hover:underline ml-3">{{ __('messages.use_local_auth') }}</a>
                        </div>
                    @endauth
                </div>
            </div>
        </header>

        <main class="py-8">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                @include('partials.flash')
                @yield('content')
            </div>
        </main>

        <footer class="border-t border-white/10 bg-slate-950/95 py-6">
            <div class="mx-auto flex max-w-7xl flex-col gap-4 px-4 text-sm text-slate-400 sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
                <p>© {{ date('Y') }} {{ __('messages.app_name') }}. AI Facebook Messenger Assistant for Myanmar businesses.</p>
                <p>{{ __('messages.sign_out_project') }}</p>
            </div>
        </footer>
    </div>
</body>
    <!-- Clerk client (loads from CDN) with data attributes for automatic init -->
    <script src="https://cdn.jsdelivr.net/npm/@clerk/clerk-js@latest/dist/clerk.browser.js" data-clerk-publishable-key="{{ env('VITE_CLERK_PUBLISHABLE_KEY') }}" data-clerk-domain="{{ env('CLERK_FRONTEND_API') }}" defer></script>
    <script>
        (function(){
            const frontendApi = "{{ rtrim(env('CLERK_FRONTEND_API', ''), '/') }}";

            function tryCall(...names){
                try{
                    const target = window.Clerk || window.clerk;
                    if(!target) return false;
                    for(const n of names){
                        const fn = target[n];
                        if(typeof fn === 'function'){
                            fn.call(target);
                            return true;
                        }
                    }
                }catch(e){console.error('Clerk call error', e)}
                return false;
            }

            window.openClerkSignIn = function(){
                // Try common method names on the exposed global
                if(tryCall('openSignIn','openSignInModal','open','showSignIn')) return;
                // Fallback: redirect to Clerk hosted sign-in page
                if(frontendApi){
                    const redirect = encodeURIComponent(window.location.origin + '/auth/callback');
                    window.location.href = `${frontendApi.replace(/\/$/, '')}/sign-in?redirect_url=${redirect}`;
                    return;
                }
                alert('Clerk is not ready yet. Please try again in a moment.');
            };

            window.openClerkSignUp = function(){
                if(tryCall('openSignUp','openSignUpModal','open','showSignUp')) return;
                if(frontendApi){
                    const redirect = encodeURIComponent(window.location.origin + '/auth/callback');
                    window.location.href = `${frontendApi.replace(/\/$/, '')}/sign-up?redirect_url=${redirect}`;
                    return;
                }
                alert('Clerk is not ready yet. Please try again in a moment.');
            };
        })();
    </script>
</html>
