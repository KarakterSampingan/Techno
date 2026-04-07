<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Techno - Masuk atau daftar gratis" />
        <title>Techno · Masuk / Daftar</title>
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
                                techno: { emerald: '#10b981', midnight: '#0f172a' },
                            },
                        },
                    },
                };
            </script>
            <style>
                body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
            </style>
        @endif
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
        <style>
            [x-cloak] { display: none !important; }
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-20px) rotate(3deg); }
            }
            .mascot-float {
                animation: float 6s ease-in-out infinite;
            }
            .glow-emerald-strong {
                box-shadow: 0 0 60px rgba(16, 185, 129, 0.6), 0 0 100px rgba(16, 185, 129, 0.3);
            }
        </style>
    </head>
    <body class="min-h-screen bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 text-white relative overflow-x-hidden">
        @include('components.page-loader')
        
        <!-- Animated Background Blobs -->
        <div class="fixed inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-96 h-96 bg-emerald-500/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-lime-500/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute top-1/2 left-1/2 w-96 h-96 bg-cyan-500/10 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-10">
            <div class="px-6 sm:px-10 lg:px-16 py-6 flex items-center justify-between">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="h-11 w-11 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-xl font-bold shadow-lg shadow-emerald-500/50 group-hover:shadow-emerald-500/70 transition-all">T</div>
                    <div>
                        <p class="text-lg font-semibold">Techno</p>
                        <p class="text-xs tracking-[0.4em] uppercase text-emerald-200">Belajar Coding</p>
                    </div>
                </a>
                <a href="/fitur" class="text-sm font-semibold text-white/80 hover:text-emerald-200 transition-colors">Lihat fitur</a>
            </div>

            <main class="px-6 sm:px-10 lg:px-16 pb-16">
                <div class="max-w-6xl mx-auto grid lg:grid-cols-2 gap-10 items-center">
                    <section class="space-y-6 relative">
                        <p class="text-xs uppercase tracking-[0.6em] text-emerald-200 font-semibold">Masuk & Daftar</p>
                        <h1 class="text-5xl font-bold leading-tight bg-gradient-to-r from-white via-emerald-100 to-white bg-clip-text text-transparent">
                            Saatnya login! XP kamu sudah menunggu.
                        </h1>
                        <p class="text-white/70 text-lg leading-relaxed">Pilih cara tercepat: klik Google atau gunakan email & password. Proses cepat dan mudah.</p>
                        
                        <ul class="space-y-4 text-sm text-white/80">
                            <li class="flex gap-4 items-start bg-white/5 backdrop-blur-sm rounded-2xl p-4 border border-white/10 hover:border-emerald-400/50 transition-all">
                                <span class="text-2xl">🔥</span>
                                <span>Daily streak dan hearts langsung sinkron setelah login.</span>
                            </li>
                            <li class="flex gap-4 items-start bg-white/5 backdrop-blur-sm rounded-2xl p-4 border border-white/10 hover:border-emerald-400/50 transition-all">
                                <span class="text-2xl">🏅</span>
                                <span>Badge seperti "Si Paling Ngotek" aman tersimpan di server.</span>
                            </li>
                            <li class="flex gap-4 items-start bg-white/5 backdrop-blur-sm rounded-2xl p-4 border border-white/10 hover:border-emerald-400/50 transition-all">
                                <span class="text-2xl">💼</span>
                                <span>Profil portofolio otomatis ter-update untuk talent pool perusahaan.</span>
                            </li>
                        </ul>

                        <!-- Mascot -->
                        @php
                            $mascotPath = 'images/mascot/mascot.png';
                            $mascotExists = file_exists(public_path($mascotPath));
                        @endphp
                        <div class="hidden lg:block absolute -bottom-32 -right-40 w-64">
                            <div class="relative">
                                <div class="absolute -inset-8 bg-gradient-to-br from-emerald-400/30 via-lime-400/20 to-yellow-400/10 rounded-full blur-3xl animate-pulse"></div>
                                @if ($mascotExists)
                                    <img src="{{ asset($mascotPath) }}" alt="Tupai Dev - Maskot Techno" class="relative w-full h-64 object-contain drop-shadow-2xl mascot-float" />
                                @else
                                    <div class="relative mascot-float">
                                        <div class="text-8xl animate-bounce">🐿️</div>
                                        <p class="text-xs text-emerald-300 mt-2 text-center font-semibold">Tupai Dev</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </section>

                    <section id="register" class="bg-white text-slate-900 rounded-[32px] p-8 shadow-2xl glow-emerald-strong" x-data="{ tab: @js(old('auth_mode', 'login')) }">
                        <div class="flex items-center gap-2 p-1 bg-slate-100 rounded-full text-sm font-semibold">
                            <button @click="tab='login'" :class="tab==='login' ? 'bg-gradient-to-r from-emerald-500 to-emerald-600 shadow-lg shadow-emerald-500/50 px-5 py-2 rounded-full text-white' : 'px-5 py-2 rounded-full text-slate-600 hover:text-slate-900 transition-colors'">Masuk</button>
                            <button @click="tab='register'" :class="tab==='register' ? 'bg-gradient-to-r from-emerald-500 to-emerald-600 shadow-lg shadow-emerald-500/50 px-5 py-2 rounded-full text-white' : 'px-5 py-2 rounded-full text-slate-600 hover:text-slate-900 transition-colors'">Daftar Gratis</button>
                        </div>
                        <div class="mt-6 space-y-6">
                            @if (session('status'))
                                <div class="rounded-2xl bg-emerald-50 border border-emerald-300 px-4 py-3 text-sm text-emerald-700">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <button class="w-full flex items-center justify-center gap-3 border border-slate-200 rounded-2xl px-4 py-3 font-semibold hover:border-emerald-400 hover:bg-slate-50 transition-all">
                                <img src="https://www.svgrepo.com/show/475656/google-color.svg" alt="Google" class="h-5 w-5" />
                                Lanjut dengan Google
                            </button>
                            <div class="flex items-center gap-3 text-xs text-slate-400 uppercase tracking-[0.4em]">
                                <span class="flex-1 border-t border-slate-200"></span>
                                <span>atau</span>
                                <span class="flex-1 border-t border-slate-200"></span>
                            </div>
                            <div x-cloak x-show="tab==='login'" x-transition>
                                <form class="space-y-4" method="POST" action="{{ route('auth.login') }}">
                                    @csrf
                                    <input type="hidden" name="auth_mode" value="login" />
                                    <div>
                                        <label class="text-sm font-semibold text-slate-700">Email / Username</label>
                                        <input
                                            type="text"
                                            name="identifier"
                                            value="{{ old('identifier') }}"
                                            class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all"
                                            placeholder="contoh: siPalingNgotek atau kamu@kampus.ac.id"
                                            required
                                        />
                                        @error('identifier')
                                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold text-slate-700">Password</label>
                                        <input
                                            type="password"
                                            name="password"
                                            class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all"
                                            placeholder="minimal 8 karakter"
                                            required
                                        />
                                        @error('password')
                                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="flex items-center justify-between text-xs text-slate-600">
                                        <label class="flex items-center gap-2 cursor-pointer hover:text-slate-900 transition-colors">
                                            <input type="checkbox" name="remember" class="rounded border-slate-300 text-emerald-500 focus:ring-emerald-500" />
                                            Ingat akun ini
                                        </label>
                                        <a href="#" class="font-semibold text-emerald-600 hover:text-emerald-700 transition-colors">Lupa password?</a>
                                    </div>
                                    <button class="w-full rounded-2xl bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold py-3 shadow-lg shadow-emerald-500/50 hover:shadow-emerald-500/70 hover:from-emerald-400 hover:to-emerald-500 transition-all">Masuk Sekarang</button>
                                </form>
                            </div>
                            <div x-cloak x-show="tab==='register'" x-transition>
                                <form class="space-y-4" method="POST" action="{{ route('auth.register') }}">
                                    @csrf
                                    <input type="hidden" name="auth_mode" value="register" />
                                    <div class="grid gap-4">
                                        <div>
                                            <label class="text-sm font-semibold text-slate-700">Username / Nama Tampilan</label>
                                            <input
                                                type="text"
                                                name="name"
                                                value="{{ old('name') }}"
                                                class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all"
                                                placeholder="contoh: siPalingNgotek"
                                                required
                                            />
                                            @error('name')
                                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold text-slate-700">Email Kampus</label>
                                            <input
                                                type="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all"
                                                placeholder="kamu@kampus.ac.id"
                                                required
                                            />
                                            @error('email')
                                                <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold text-slate-700">Password</label>
                                        <input
                                            type="password"
                                            name="password"
                                            class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all"
                                            placeholder="minimal 8 karakter"
                                            required
                                        />
                                        @error('password')
                                            <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div>
                                        <label class="text-sm font-semibold text-slate-700">Konfirmasi Password</label>
                                        <input
                                            type="password"
                                            name="password_confirmation"
                                            class="mt-2 w-full rounded-2xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-900 placeholder:text-slate-400 focus:outline-none focus:border-emerald-400 focus:ring-2 focus:ring-emerald-400/20 transition-all"
                                            placeholder="ulangi password kamu"
                                            required
                                        />
                                    </div>
                                    <button class="w-full rounded-2xl bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold py-3 shadow-lg shadow-emerald-500/50 hover:shadow-emerald-500/70 hover:from-emerald-400 hover:to-emerald-500 transition-all">Daftar Gratis</button>
                                </form>
                            </div>
                            <p class="text-xs text-slate-500 text-center">
                                Dengan lanjut, kamu setuju dengan
                                <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 transition-colors">Terms</a> & <a href="#" class="text-emerald-600 font-semibold hover:text-emerald-700 transition-colors">Privacy</a>.
                            </p>
                        </div>
                    </section>
                </div>
            </main>

            <footer class="px-6 sm:px-10 lg:px-16 pb-8 text-sm text-white/60 text-center">
                <p>Masih bingung? Hubungi kami di Instagram <a href="#" class="text-emerald-300 hover:text-emerald-200 transition-colors font-semibold">@techno.ngoding</a></p>
            </footer>
        </div>
    </body>
</html>
