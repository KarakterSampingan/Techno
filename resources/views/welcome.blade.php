<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Techno - Duolingo versi coding untuk mahasiswa Indonesia" />
        <title>{{ config('app.name', 'Techno') }} · Duolingo untuk Belajar Coding</title>
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @php
            $hasViteBuild = file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'));
        @endphp
        @if ($hasViteBuild)
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: [
                                    'Instrument Sans',
                                    'ui-sans-serif',
                                    'system-ui',
                                    'sans-serif',
                                ],
                            },
                            colors: {
                                techno: {
                                    emerald: '#10b981',
                                    dark: '#0f172a',
                                },
                            },
                        },
                    },
                };
            </script>
            <style>
                body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
            </style>
        @endif
        <style>
            @keyframes mascot-float {
                0%,
                100% { transform: translateY(0) rotate(0deg); }
                50% { transform: translateY(-12px) rotate(1.5deg); }
            }
            .mascot-float { animation: mascot-float 6s ease-in-out infinite; }
        </style>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    </head>
    <body class="bg-[#F1F5F9] text-slate-900 font-sans">
        @include('components.page-loader')
        <div class="relative isolate min-h-screen overflow-hidden">
            <div class="absolute inset-x-0 top-0 -z-10 flex justify-center">
                <div class="h-80 w-[60rem] bg-gradient-to-r from-green-300 via-lime-200 to-emerald-300 blur-3xl opacity-60"></div>
            </div>
            <header class="px-6 sm:px-10 lg:px-16 py-6 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-12 w-12 rounded-2xl bg-emerald-500 flex items-center justify-center text-white text-2xl font-bold">T</div>
                    <div>
                        <p class="text-lg font-semibold">Techno</p>
                        <p class="text-xs uppercase tracking-[0.2em] text-emerald-700">Belajar Coding Santai</p>
                    </div>
                </div>
                <nav class="hidden md:flex gap-6 text-sm font-medium text-slate-600">
                    <a href="#tracks" class="hover:text-emerald-600">Modul</a>
                    <a href="#gamification" class="hover:text-emerald-600">Gamifikasi</a>
                    <a href="#leaderboard" class="hover:text-emerald-600">Komunitas</a>
                    <a href="#talent" class="hover:text-emerald-600">Talent Pool</a>
                    <a href="/fitur" class="hover:text-emerald-600">Detail Fitur</a>
                </nav>
                <div class="flex items-center gap-3">
                    @auth
                        <div class="flex items-center gap-2 rounded-full bg-white/80 border border-slate-200 px-3 py-2 shadow-sm">
                            <div class="h-10 w-10 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center font-semibold">
                                {{ strtoupper(substr(Auth::user()->name ?? 'T', 0, 1)) }}
                            </div>
                            <div class="text-left">
                                <p class="text-xs text-slate-400">Halo,</p>
                                <p class="text-sm font-semibold text-slate-800">{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('auth.logout') }}" class="m-0">
                            @csrf
                            <button class="px-4 py-2 rounded-full border border-rose-200 text-sm font-semibold text-rose-600 hover:border-rose-400">
                                Keluar
                            </button>
                        </form>
                    @else
                        <a href="/auth" class="hidden sm:inline-flex px-4 py-2 rounded-full border border-slate-300 text-sm font-semibold hover:border-emerald-400">Masuk</a>
                        <a href="/auth#register" class="px-4 py-2 rounded-full bg-emerald-500 text-white text-sm font-semibold shadow-lg shadow-emerald-500/30">Daftar Gratis</a>
                    @endauth
                </div>
            </header>

            <main class="px-6 sm:px-10 lg:px-16">
                <!-- HERO -->
                <section class="grid lg:grid-cols-2 gap-10 items-center py-12">
                    <div class="space-y-6">
                        <p class="inline-flex items-center gap-2 text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700">
                            <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                            Duolingo versi coding
                        </p>
                        <h1 class="text-4xl sm:text-5xl font-bold leading-tight text-slate-900">
                            Saatnya coding! Pelajari HTML sampai Python hanya dalam 10 menit per sesi.
                        </h1>
                        <p class="text-lg text-slate-600">
                            Platform gamifikasi untuk mahasiswa Indonesia yang ingin meningkatkan keterampilan tanpa materi berat. Latihan singkat, compiler ringan, dan humor relevan agar belajar tetap menyenangkan.
                        </p>
                        <div class="flex flex-wrap gap-4">
                            <a href="/auth#register" class="px-5 py-3 rounded-2xl bg-emerald-500 text-white font-semibold shadow-lg shadow-emerald-500/40">
                                Mulai Belajar Sekarang
                            </a>
                            <a href="/auth#register" class="px-5 py-3 rounded-2xl border border-slate-300 font-semibold text-slate-800 hover:border-emerald-400">
                                Lihat Demo Compiler
                            </a>
                        </div>
                        <dl class="grid grid-cols-3 gap-4 text-center text-sm text-slate-600">
                            <div class="rounded-2xl bg-white/80 p-4 shadow-sm">
                                <dt class="text-xs uppercase tracking-widest text-slate-400">Mahasiswa Aktif</dt>
                                <dd class="text-2xl font-bold text-slate-900">12K+</dd>
                            </div>
                            <div class="rounded-2xl bg-white/80 p-4 shadow-sm">
                                <dt class="text-xs uppercase tracking-widest text-slate-400">Daily Streak</dt>
                                <dd class="text-2xl font-bold text-emerald-600">89🔥</dd>
                            </div>
                            <div class="rounded-2xl bg-white/80 p-4 shadow-sm">
                                <dt class="text-xs uppercase tracking-widest text-slate-400">Kampus Aktif</dt>
                                <dd class="text-2xl font-bold text-slate-900">17</dd>
                            </div>
                        </dl>
                    </div>
                    <div class="relative">
                        <div class="rounded-[32px] bg-white p-6 shadow-2xl border border-emerald-50">
                            <div class="flex items-center justify-between mb-4">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.2em] text-slate-400">Streak Hari Ini</p>
                                    <p class="text-3xl font-semibold">🔥 12</p>
                                </div>
                                <span class="px-3 py-1 text-xs font-semibold bg-emerald-100 text-emerald-700 rounded-full">Premium aktif</span>
                            </div>
                            <div class="grid grid-cols-3 gap-4">
                                <div class="rounded-2xl border border-slate-100 p-4">
                                    <p class="text-xl font-bold text-slate-900">342 XP</p>
                                    <p class="text-xs text-slate-500">Minggu ini</p>
                                </div>
                                <div class="rounded-2xl border border-slate-100 p-4">
                                    <p class="text-xl font-bold text-rose-500">❤︎ ❤︎ ❤︎ ❤︎</p>
                                    <p class="text-xs text-slate-500">4/5 Hearts</p>
                                </div>
                                <div class="rounded-2xl border border-slate-100 p-4">
                                    <p class="text-xl font-bold text-amber-500">Lvl 6</p>
                                    <p class="text-xs text-slate-500">Ahli Logika</p>
                                </div>
                            </div>
                            <div class="mt-6 rounded-3xl bg-gradient-to-r from-emerald-400 to-lime-300 p-5 text-white">
                                <p class="text-sm uppercase tracking-[0.3em]">Tantangan Kampus</p>
                                <p class="text-2xl font-semibold">Top 10 Kampus minggu ini</p>
                                <p class="text-sm text-emerald-50">Kumpulkan XP bersama teman kampusmu dan dapatkan badge "Raja Python Pemula".</p>
                            </div>
                        </div>
                        <div class="mt-8 w-full max-w-sm lg:absolute lg:-left-8 lg:-bottom-20 lg:w-64 rounded-3xl bg-white shadow-xl border border-slate-100 p-4 rotate-3">
                            <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Mini Compiler</p>
                            <pre class="text-sm font-mono text-slate-800 bg-slate-50 rounded-2xl px-3 py-3 mt-2 whitespace-pre">print('Halo Indonesia!')</pre>
                            <p class="mt-2 text-emerald-600 text-sm font-semibold">Output: Halo Indonesia!</p>
                        </div>
                        @php
                            $mascotPath = 'images/mascot/mascot.png';
                            $mascotExists = file_exists(public_path($mascotPath));
                        @endphp
                        <div class="mt-10 flex justify-center lg:mt-0 lg:absolute lg:-right-12 lg:-bottom-48 lg:w-96">
                            <div class="relative w-full max-w-[22rem]">
                                <div class="absolute -inset-8 rounded-full bg-gradient-to-br from-emerald-200/70 via-lime-200/60 to-yellow-200/50 blur-3xl animate-pulse"></div>
                                @if ($mascotExists)
                                    <img src="{{ asset($mascotPath) }}" alt="Tupai Dev - Maskot Techno" class="relative w-full h-80 object-contain drop-shadow-2xl mascot-float" />
                                @else
                                    <div class="relative h-80 rounded-3xl bg-gradient-to-br from-emerald-50 to-lime-50 border-2 border-dashed border-emerald-300 text-center flex flex-col items-center justify-center px-4 mascot-float">
                                        <div class="text-9xl mb-4 animate-bounce">🐿️</div>
                                        <p class="text-lg font-bold text-emerald-700">Tupai Dev</p>
                                        <p class="text-sm text-slate-600 mt-2">Maskot Techno yang lagi ngumpulin XP</p>
                                        <div class="mt-4 px-3 py-1 rounded-full bg-white/80 border border-emerald-200">
                                            <p class="text-[10px] text-slate-500">💡 Ganti dengan gambar custom di:</p>
                                            <p class="text-[10px] font-mono text-emerald-600 mt-0.5">public/images/mascot/mascot.png</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </section>

                <!-- TRACK SELECTOR -->
                <section id="tracks" class="py-12 border-t border-slate-200">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700">Modul bite-sized</p>
                            <h2 class="text-3xl font-semibold text-slate-900">Track singkat ala "lesson bubble" Duolingo.</h2>
                            <p class="text-slate-600 mt-2 max-w-2xl">Pilih bahasa favoritmu, setiap modul hanya 7-10 menit. Semua materi dibagi menjadi blok visual agar tetap ringan.</p>
                        </div>
                        <a href="/auth#register" class="text-sm font-semibold text-emerald-600 hover:text-emerald-700">Lihat roadmap lengkap →</a>
                    </div>
                    <div x-data="{ track: 'python' }" class="mt-8 space-y-6">
                        <div class="flex flex-wrap gap-3">
                            <button @click="track = 'python'" :class="track === 'python' ? 'bg-emerald-500 text-white' : 'bg-white text-slate-600'" class="px-4 py-2 rounded-full text-sm font-semibold shadow">
                                Python Dasar
                            </button>
                            <button @click="track = 'html'" :class="track === 'html' ? 'bg-emerald-500 text-white' : 'bg-white text-slate-600'" class="px-4 py-2 rounded-full text-sm font-semibold shadow">
                                HTML & CSS
                            </button>
                            <button @click="track = 'js'" :class="track === 'js' ? 'bg-emerald-500 text-white' : 'bg-white text-slate-600'" class="px-4 py-2 rounded-full text-sm font-semibold shadow">
                                JavaScript Logic
                            </button>
                            <button @click="track = 'python-ai'" :class="track === 'python-ai' ? 'bg-emerald-500 text-white' : 'bg-white text-slate-600'" class="px-4 py-2 rounded-full text-sm font-semibold shadow">
                                Python AI Starter
                            </button>
                        </div>
                        <div class="grid md:grid-cols-3 gap-6">
                            <template x-for="module in {
                                python: [
                                    { title: 'Sintaks Santai', xp: 80, desc: 'Belajar variabel dengan analogi sederhana.' },
                                    { title: 'Percabangan Interaktif', xp: 90, desc: 'Pelajari if-else melalui studi kasus sehari-hari.' },
                                    { title: 'Mini Project CLI', xp: 120, desc: 'Bangun kalkulator ongkir nasional.' },
                                ],
                                html: [
                                    { title: 'Layout Kafe Modern', xp: 70, desc: 'Susun flexbox agar layout tetap rapi.' },
                                    { title: 'Tailwind Turbo', xp: 110, desc: 'Utility class untuk pendekatan mobile-first.' },
                                    { title: 'Micro Interaction', xp: 95, desc: 'Gunakan Alpine untuk CTA interaktif.' },
                                ],
                                js: [
                                    { title: 'DOM Drag & Drop', xp: 85, desc: 'Bangun latihan menyusun blok logika.' },
                                    { title: 'Real-time XP Meter', xp: 105, desc: 'Perbarui XP secara langsung dengan Alpine store.' },
                                    { title: 'Mini Compiler JS', xp: 140, desc: 'Evaluasi aman untuk latihan fungsi.' },
                                ],
                                'python-ai': [
                                    { title: 'Data Cleaning', xp: 100, desc: 'Mengenal pandas dan pustaka pendukung.' },
                                    { title: 'Prompt to Code', xp: 120, desc: 'Menghasilkan snippet yang dinilai otomatis.' },
                                    { title: 'Campus Talent Bot', xp: 150, desc: 'Bangun rekomendasi kandidat magang otomatis.' },
                                ]
                            }[track]" :key="module.title">
                                <article class="rounded-3xl bg-white p-6 border border-slate-100 shadow-sm hover:-translate-y-1 hover:shadow-xl transition">
                                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">+<span x-text="module.xp"></span> XP</p>
                                    <h3 class="text-xl font-semibold text-slate-900 mt-3" x-text="module.title"></h3>
                                    <p class="text-sm text-slate-600 mt-2" x-text="module.desc"></p>
                                    <a href="/auth#register" class="mt-4 flex items-center gap-2 text-sm font-semibold text-emerald-600">
                                        <span>Mulai Lesson</span>
                                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                                    </a>
                                </article>
                            </template>
                        </div>
                    </div>
                </section>

                <!-- GAMIFICATION -->
                <section id="gamification" class="py-12 border-t border-slate-200">
                    <div class="grid lg:grid-cols-2 gap-10 items-start">
                        <div class="space-y-4">
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700">Gamification & Retention</p>
                            <h2 class="text-3xl font-semibold text-slate-900">Streak, Hearts, XP, dan badge seru agar motivasi belajar tetap tinggi.</h2>
                            <ul class="space-y-3 text-slate-700">
                                <li class="flex gap-3">
                                    <span class="text-2xl">🔥</span>
                                    <div>
                                        <p class="font-semibold">Daily Streak & Streak Freeze</p>
                                        <p class="text-sm">Lewat sehari dan streak hampir putus? Pengguna premium mendapatkan item "Streak Freeze" untuk menjaga progres.</p>
                                    </div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-2xl">❤</span>
                                    <div>
                                        <p class="font-semibold">Sistem Hearts</p>
                                        <p class="text-sm">Saat Hearts tinggal satu, pengguna bisa menonton rewarded ads untuk menambah Hearts sambil menyelesaikan kuis ringan.</p>
                                    </div>
                                </li>
                                <li class="flex gap-3">
                                    <span class="text-2xl">🏅</span>
                                    <div>
                                        <p class="font-semibold">Badge tematik</p>
                                        <p class="text-sm">Contoh: "Penjelajah Python" dan "Frontend Sprinter" untuk pemburu XP.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="grid gap-4">
                            <article class="rounded-3xl bg-white border border-slate-100 p-6 shadow-lg">
                                <header class="flex items-center justify-between mb-4">
                                    <p class="text-sm font-semibold text-slate-500">Progress Hari Ini</p>
                                    <span class="px-3 py-1 text-xs rounded-full bg-amber-100 text-amber-600">Combo x3</span>
                                </header>
                                <div class="space-y-3">
                                    @php
                                        $streak = [
                                            ['label' => 'Streak', 'value' => '12 Hari', 'color' => 'text-orange-500'],
                                            ['label' => 'Hearts', 'value' => '3/5', 'color' => 'text-rose-500'],
                                            ['label' => 'XP', 'value' => '+220', 'color' => 'text-emerald-600'],
                                        ];
                                    @endphp
                                    @foreach ($streak as $stat)
                                        <div class="flex items-center justify-between rounded-2xl border border-slate-100 px-4 py-3">
                                            <p class="text-sm font-medium text-slate-500">{{ $stat['label'] }}</p>
                                            <p class="text-lg font-semibold {{ $stat['color'] }}">{{ $stat['value'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                                <footer class="mt-4 flex items-center gap-2 text-sm text-slate-500">
                                    <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                                    Update realtime via Livewire XP stream.
                                </footer>
                            </article>
                            <div class="rounded-3xl border border-dashed border-emerald-300 bg-emerald-50/70 p-6 text-emerald-800">
                                <p class="text-sm font-semibold uppercase tracking-[0.3em]">Rewarded Ads Slot</p>
                                <p class="text-2xl font-semibold mt-2">Tambah Hearts hanya 15 detik.</p>
                                <p class="text-sm mt-1">Integrasi AdMob atau Pangle yang otomatis mencatat XP ledger dan heart ledger.</p>
                                <a href="/auth#register" class="mt-4 px-4 py-2 text-sm font-semibold bg-white text-emerald-600 rounded-full shadow">Simulasikan Reward</a>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- LEADERBOARD -->
                <section id="leaderboard" class="py-12 border-t border-slate-200">
                    <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700">Sosial & Kompetisi</p>
                            <h2 class="text-3xl font-semibold text-slate-900">Leaderboard global, kampus, hingga antarkampus di seluruh Indonesia.</h2>
                            <p class="text-slate-600 mt-2">Filter XP mingguan, lihat streak teman, langsung tambahkan teman baru. Semua menggunakan query ringan dan caching Redis.</p>
                        </div>
                        <div class="flex gap-2">
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-white border border-slate-200">Global</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-emerald-500 text-white">Kampus A</span>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full bg-white border border-slate-200">Kampus B</span>
                        </div>
                    </div>
                    <div class="mt-8 grid lg:grid-cols-2 gap-8">
                        <div class="rounded-3xl bg-white border border-slate-100 shadow-sm">
                            <header class="flex items-center justify-between p-6 border-b border-slate-100">
                                <div>
                                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Leaderboard Mingguan</p>
                                    <p class="text-xl font-semibold text-slate-900">Top 5 Global</p>
                                </div>
                                <p class="text-sm text-slate-500">Season #18</p>
                            </header>
                            <ul>
                                @php
                                    $leaders = [
                                        ['rank' => 1, 'name' => 'Alya - UI', 'xp' => 980, 'badge' => 'Ahli Algoritma'],
                                        ['rank' => 2, 'name' => 'Reno - ITB', 'xp' => 910, 'badge' => 'Raja Python'],
                                        ['rank' => 3, 'name' => 'Lala - Telkom University', 'xp' => 860, 'badge' => 'CSS Styler'],
                                        ['rank' => 4, 'name' => 'Yudha - UGM', 'xp' => 820, 'badge' => 'Fullstack Rookie'],
                                        ['rank' => 5, 'name' => 'Gerry - BINUS', 'xp' => 780, 'badge' => 'Bug Slayer'],
                                    ];
                                @endphp
                                @foreach ($leaders as $leader)
                                    <li class="flex items-center gap-4 px-6 py-4 border-t border-slate-100">
                                        <div class="h-10 w-10 rounded-full bg-emerald-50 flex items-center justify-center font-semibold text-emerald-600">{{ $leader['rank'] }}</div>
                                        <div class="flex-1">
                                            <p class="font-semibold text-slate-800">{{ $leader['name'] }}</p>
                                            <p class="text-xs text-slate-500">{{ $leader['badge'] }}</p>
                                        </div>
                                        <p class="font-semibold text-emerald-600">{{ $leader['xp'] }} XP</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="rounded-3xl bg-gradient-to-br from-indigo-500 via-sky-500 to-emerald-400 text-white p-8 shadow-xl">
                            <p class="text-xs uppercase tracking-[0.4em]">Tambah Teman</p>
                            <h3 class="text-3xl font-semibold mt-4">Jaga streak temanmu agar tidak menurun.</h3>
                            <p class="mt-3 text-sm text-white/80">Notifikasi push "Halo, streak-mu hampir habis" menggunakan bahasa Indonesia yang netral.</p>
                            <div class="mt-6 grid gap-4">
                                <div class="flex items-center justify-between bg-white/10 rounded-2xl px-4 py-3">
                                    <div>
                                        <p class="font-semibold">@ari.ngide</p>
                                        <p class="text-xs text-white/70">Streak 7 🔥</p>
                                    </div>
                                    <button class="px-3 py-1 text-xs font-semibold bg-white text-emerald-600 rounded-full">Tambah</button>
                                </div>
                                <div class="flex items-center justify-between bg-white/10 rounded-2xl px-4 py-3">
                                    <div>
                                        <p class="font-semibold">@mega.codes</p>
                                        <p class="text-xs text-white/70">XP minggu ini 640</p>
                                    </div>
                                    <button class="px-3 py-1 text-xs font-semibold bg-white text-emerald-600 rounded-full">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- TALENT POOL / B2B -->
                <section id="talent" class="py-12 border-t border-slate-200">
                    <div class="grid lg:grid-cols-2 gap-10 items-center">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.3em] text-emerald-700">Talent Pool B2B</p>
                            <h2 class="text-3xl font-semibold text-slate-900">Mini portofolio otomatis + dashboard sponsor.</h2>
                            <p class="text-slate-600 mt-3">Kumpulkan XP, badge, dan proyek mini. Sistem otomatis membuat portofolio satu halaman yang bisa diunduh untuk melamar magang. Perusahaan tinggal memfilter XP, kampus, skill, dan streak.</p>
                            <div class="mt-6 grid gap-4">
                                <div class="rounded-2xl bg-white p-4 border border-slate-100 shadow-sm">
                                    <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Highlight Mahasiswa</p>
                                    <p class="text-lg font-semibold text-slate-900">Anya - Level 8</p>
                                    <p class="text-sm text-slate-500">XP 4.210 · Badge 6 · Project: Kampus Meal Planner</p>
                                </div>
                                <div class="rounded-2xl bg-white p-4 border border-dashed border-emerald-200">
                                    <p class="text-sm font-semibold text-slate-700">Talent Pool Dashboard</p>
                                    <p class="text-xs text-slate-500">Filter: kampus, XP, skill, availability. Export ke ATS perusahaan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-[32px] bg-white border border-slate-100 shadow-2xl p-6">
                            <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Preview Dashboard</p>
                            <div class="mt-4 space-y-4">
                                <div class="flex items-center gap-3">
                                    <input type="text" placeholder="Cari mahasiswa" class="flex-1 rounded-2xl border border-slate-200 px-4 py-2 text-sm focus:outline-none focus:border-emerald-400" />
                                    <button class="px-3 py-2 rounded-2xl bg-emerald-500 text-white text-sm font-semibold">Filter</button>
                                </div>
                                <table class="w-full text-sm text-left">
                                    <thead>
                                        <tr class="text-slate-400">
                                            <th class="py-2">Nama</th>
                                            <th>Kampus</th>
                                            <th>XP</th>
                                            <th>Skill</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-slate-600">
                                        <tr class="border-t border-slate-100">
                                            <td class="py-3 font-semibold text-slate-900">Naya</td>
                                            <td>UI</td>
                                            <td>4.5K</td>
                                            <td class="text-emerald-600">Python, JS</td>
                                        </tr>
                                        <tr class="border-t border-slate-100">
                                            <td class="py-3 font-semibold text-slate-900">Damar</td>
                                            <td>ITB</td>
                                            <td>3.8K</td>
                                            <td class="text-emerald-600">Frontend</td>
                                        </tr>
                                        <tr class="border-t border-slate-100">
                                            <td class="py-3 font-semibold text-slate-900">Salsa</td>
                                            <td>UGM</td>
                                            <td>3.5K</td>
                                            <td class="text-emerald-600">Python AI</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <p class="text-xs text-slate-400">Perusahaan bisa shortlist + kirim pesan langsung.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- MONETIZATION CTA -->
                <section class="py-12 border-t border-slate-200">
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="rounded-[32px] bg-gradient-to-br from-lime-400 to-emerald-500 text-white p-8 shadow-xl">
                            <p class="text-xs uppercase tracking-[0.4em]">Premium Mahasiswa</p>
                            <h3 class="text-3xl font-semibold mt-3">Unlimited Hearts + Streak Freeze</h3>
                            <p class="text-sm text-white/80 mt-2">Rp39.000/bulan · bebas iklan, dukungan offline, XP booster 2x tiap minggu.</p>
                            <div class="mt-6 flex flex-wrap gap-3">
                                <a href="/premium" class="px-5 py-3 rounded-2xl bg-white text-emerald-600 font-semibold">Aktifkan Premium</a>
                                <a href="/premium" class="px-5 py-3 rounded-2xl border border-white/60 text-white font-semibold">Lihat Benefit</a>
                            </div>
                        </div>
                        <div class="rounded-[32px] bg-white border border-slate-100 p-8 shadow-sm">
                            <p class="text-xs uppercase tracking-[0.4em] text-emerald-500">Rewarded Ads</p>
                            <h3 class="text-3xl font-semibold text-slate-900 mt-3">Monetisasi non-intrusif.</h3>
                            <p class="text-slate-600 mt-2">Integrasi AdMob/Unity Ads untuk menambah heart atau XP ganda. Timer cooldown memastikan pengguna tidak menyalahgunakan fitur. Semua log masuk ke `rewarded_ad_logs` & `xp_transactions`.</p>
                            <div class="mt-6 grid gap-3 text-sm text-slate-600">
                                <div class="flex items-center gap-3">
                                    <span class="h-8 w-8 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-semibold">1</span>
                                    <p>Nonton 15 detik → +1 heart.</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="h-8 w-8 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-semibold">2</span>
                                    <p>Cooldown 30 menit, tercatat di ledger.</p>
                                </div>
                                <div class="flex items-center gap-3">
                                    <span class="h-8 w-8 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-semibold">3</span>
                                    <p>Premium bisa skip iklan, auto refill hearts.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>

            <footer class="px-6 sm:px-10 lg:px-16 py-10 border-t border-slate-200">
                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="text-lg font-semibold text-slate-900">Techno · Coding Playground Indonesia</p>
                        <p class="text-sm text-slate-500">Dibuat dengan semangat mahasiswa Indonesia. Jika ada bug, kirim pesan agar segera kami perbaiki.</p>
                    </div>
                    <div class="flex gap-4 text-sm text-slate-500">
                        <a href="#" class="hover:text-emerald-600">Privacy</a>
                        <a href="#" class="hover:text-emerald-600">Terms</a>
                        <a href="#" class="hover:text-emerald-600">Support</a>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
