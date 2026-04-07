<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Techno · Playground Web</title>
        <meta name="description" content="Dashboard desktop interaktif untuk modul Techno" />
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @php
            $hasViteBuild = file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'));
        @endphp
        @if ($hasViteBuild)
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            fontFamily: { sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'] },
                            colors: {
                                techno: {
                                    bg: '#05060F',
                                    card: '#0f172a',
                                    neon: '#5ef38c',
                                    hot: '#ff7a18',
                                },
                            },
                        },
                    },
                };
            </script>
        @endif
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
        <style>
            body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
            .glow-border { box-shadow: 0 0 25px rgba(94, 243, 140, 0.3); }
            @keyframes heartBeat { 0%{transform:scale(1);}50%{transform:scale(1.15);}100%{transform:scale(1);} }
            .heart-live { animation: heartBeat 1.8s infinite; }
        </style>
    </head>
    <body class="bg-techno-bg text-white min-h-screen">
        @include('components.page-loader')
        <div class="min-h-screen flex flex-col">
            <header class="border-b border-white/10 bg-gradient-to-r from-slate-900/80 via-slate-900/80 to-purple-900/60 backdrop-blur">
                <div class="max-w-6xl mx-auto px-6 py-5 flex flex-wrap items-center gap-4 justify-between">
                    <div class="flex items-center gap-3">
                        <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-violet-500 flex items-center justify-center text-xl font-bold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'T', 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-[0.5em] text-white/60">Perjalanan Web</p>
                            <p class="text-2xl font-semibold">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center gap-4 text-sm font-semibold">
                        <div class="flex items-center gap-2 bg-white/10 rounded-full px-4 py-2">
                            <span>🔥</span>
                            <span>12 Hari</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white/10 rounded-full px-4 py-2">
                            <span class="heart-live">❤️</span>
                            <span>5/5 Hearts</span>
                        </div>
                        <a href="/dashboard" class="px-4 py-2 rounded-full border border-white/20 text-white/80 hover:text-white">Versi Mobile</a>
                        <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
                            @csrf
                            <button class="px-4 py-2 rounded-full border border-rose-300 text-rose-200 hover:border-rose-400">Keluar</button>
                        </form>
                    </div>
                </div>
            </header>

            <main class="flex-1">
                <div class="max-w-6xl mx-auto px-6 py-10 grid lg:grid-cols-[1.7fr,0.8fr] gap-8">
                    <section class="space-y-8">
                        <div class="rounded-[32px] bg-gradient-to-br from-slate-800 via-slate-900 to-slate-950 p-6 border border-white/10 glow-border">
                            <div class="flex flex-wrap items-center justify-between gap-4">
                                <div>
                                    <p class="text-sm uppercase tracking-[0.4em] text-white/60">Learning Radar</p>
                                    <h2 class="text-3xl font-semibold">Modul interaktif siap dimainkan.</h2>
                                </div>
                                <div class="flex gap-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <div class="h-10 w-10 rounded-full bg-white/10 border border-white/20 flex items-center justify-center {{ $i < 5 ? 'heart-live text-rose-400' : '' }}">❤️</div>
                                    @endfor
                                </div>
                            </div>
                            <div x-data="{ tab: 'All' }" class="mt-6">
                                <div class="flex flex-wrap gap-3 text-sm font-semibold">
                                    <button @click="tab='All'" :class="tab==='All' ? 'bg-emerald-500 text-slate-900' : 'bg-white/5 text-white/70'" class="px-4 py-2 rounded-full">Semua</button>
                                    @foreach ($categories as $category)
                                        <button @click="tab='{{ $category }}'" :class="tab==='{{ $category }}' ? 'bg-emerald-500 text-slate-900' : 'bg-white/5 text-white/70'" class="px-4 py-2 rounded-full">{{ $category }}</button>
                                    @endforeach
                                </div>
                                <div class="mt-6 grid md:grid-cols-2 gap-6">
                                    @foreach ($modules as $module)
                                        <article class="rounded-3xl bg-white/5 border border-white/10 overflow-hidden flex flex-col" x-show="tab==='All' || tab==='{{ $module['category'] }}'" x-transition>
                                            <div class="h-40 bg-cover bg-center" style="background-image: url('{{ $module['thumbnail'] }}');"></div>
                                            <div class="p-5 flex flex-col gap-3 flex-1">
                                                <div class="flex items-center justify-between text-xs uppercase tracking-[0.4em] text-white/50">
                                                    <span>{{ $module['category'] }}</span>
                                                    <span>{{ $module['level'] }}</span>
                                                </div>
                                                <h3 class="text-xl font-semibold">{{ $module['title'] }}</h3>
                                                <p class="text-sm text-white/70">{{ $module['summary'] }}</p>
                                                <div class="flex items-center gap-4 text-sm text-white/60">
                                                    <span>⏱ {{ $module['duration'] }}</span>
                                                    <span>⭐ {{ $module['xp'] }} XP</span>
                                                </div>
                                                <div class="mt-auto flex items-center justify-between pt-3">
                                                    <a href="{{ route('playground.show', $module['slug']) }}" class="px-4 py-2 rounded-2xl bg-emerald-500 text-slate-900 font-semibold shadow shadow-emerald-500/40">Mainkan Modul</a>
                                                    <a href="{{ $module['resource'] }}" target="_blank" class="text-xs text-white/50 hover:text-white underline">Referensi</a>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>

                    <aside class="space-y-6">
                        <div class="rounded-3xl bg-white/5 border border-white/10 p-5">
                            <p class="text-xs uppercase tracking-[0.5em] text-white/50">Live XP Feed</p>
                            <ul class="mt-4 space-y-3 text-sm">
                                <li class="flex items-center gap-3">
                                    <span class="text-emerald-400">+80 XP</span>
                                    <p>Alya selesaikan HTML Fast Track</p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="text-emerald-400">+110 XP</span>
                                    <p>Reno unlock CSS Micro Interactions</p>
                                </li>
                                <li class="flex items-center gap-3">
                                    <span class="text-rose-400">-1 ❤️</span>
                                    <p>Shawn salah jawab puzzle JS</p>
                                </li>
                            </ul>
                        </div>
                        <div class="rounded-3xl bg-gradient-to-br from-amber-400 to-orange-600 text-slate-900 p-6 shadow-2xl">
                            <p class="text-xs uppercase tracking-[0.6em]">Unlimited Hearts</p>
                            <h3 class="text-2xl font-bold mt-2">Upgrade Premium Web</h3>
                            <p class="text-sm mt-2">Bebas iklan, auto streak freeze, XP booster 2x tiap weekend. Cuma Rp25K/bulan.</p>
                            <a href="/premium" class="mt-4 inline-flex px-5 py-3 rounded-2xl bg-slate-900 text-white font-semibold">Gas Premium</a>
                        </div>
                        <div class="rounded-3xl bg-white/5 border border-white/10 p-5">
                            <p class="text-xs uppercase tracking-[0.5em] text-white/50">Leaderboard Snapshot</p>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold">ITS</p>
                                        <p class="text-xs text-white/50">3.1K XP</p>
                                    </div>
                                    <span>🔥</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold">UNAIR</p>
                                        <p class="text-xs text-white/50">2.8K XP</p>
                                    </div>
                                    <span>⚡</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-semibold">PENS</p>
                                        <p class="text-xs text-white/50">2.4K XP</p>
                                    </div>
                                    <span>🚀</span>
                                </div>
                            </div>
                            <a href="#arena" class="mt-4 inline-flex items-center gap-2 text-sm text-emerald-400">Buka tab Arena →</a>
                        </div>
                    </aside>
                </div>
            </main>
        </div>
    </body>
</html>
