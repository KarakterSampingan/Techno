<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="Detail fitur Techno - Platform belajar coding gamified untuk mahasiswa Indonesia" />
        <title>Techno · Detail Fitur</title>
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
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
            .glow-emerald { box-shadow: 0 0 40px rgba(16, 185, 129, 0.3); }
            .glow-amber { box-shadow: 0 0 40px rgba(251, 191, 36, 0.3); }
            .glow-sky { box-shadow: 0 0 40px rgba(14, 165, 233, 0.3); }
            .glow-violet { box-shadow: 0 0 40px rgba(139, 92, 246, 0.3); }
            .glow-rose { box-shadow: 0 0 40px rgba(244, 63, 94, 0.3); }
        </style>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    </head>
    <body class="bg-gradient-to-br from-slate-50 via-white to-emerald-50 text-slate-900 font-sans">
        @include('components.page-loader')
        <div class="min-h-screen">
            <header class="px-6 sm:px-10 lg:px-16 py-6 flex items-center justify-between border-b border-slate-200 bg-white/80 backdrop-blur-md sticky top-0 z-20 shadow-sm">
                <div>
                    <p class="text-xs uppercase tracking-[0.5em] text-emerald-600 font-semibold">Techno</p>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-emerald-600 to-lime-600 bg-clip-text text-transparent">Blueprint Fitur</h1>
                </div>
                <div class="flex gap-3">
                    <a href="/" class="px-4 py-2 rounded-full border border-slate-200 text-sm font-semibold text-slate-700 hover:border-emerald-400 hover:bg-emerald-50 transition-all">Kembali ke Landing</a>
                    <a href="/premium" class="px-4 py-2 rounded-full bg-gradient-to-r from-emerald-500 to-emerald-600 text-white text-sm font-semibold shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 transition-all">Upgrade Premium</a>
                </div>
            </header>

            <main class="px-6 sm:px-10 lg:px-16 py-12 space-y-20">
                <!-- Pilar 01: Core Learning -->
                <section class="space-y-6">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 border border-emerald-200">
                        <span class="text-2xl">📚</span>
                        <p class="text-xs uppercase tracking-[0.4em] text-emerald-700 font-bold">Pilar 01</p>
                    </div>
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                        <div class="lg:w-1/3 space-y-4">
                            <h2 class="text-4xl font-bold bg-gradient-to-r from-emerald-600 to-lime-600 bg-clip-text text-transparent">Core Learning Features</h2>
                            <p class="text-slate-600 text-lg leading-relaxed">Sesi bite-sized, compiler mini, konten visual yang membuat belajar coding jadi menyenangkan.</p>
                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-50 border border-emerald-100">
                                <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                                <span class="text-sm font-semibold text-emerald-700">Fokus pada praktik</span>
                            </div>
                        </div>
                        <div class="lg:flex-1 grid md:grid-cols-2 gap-6">
                            <article class="rounded-3xl bg-white p-6 border border-emerald-100 shadow-lg hover:shadow-xl transition-all glow-emerald group">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-2xl shadow-lg">⚡</div>
                                    <p class="text-lg font-bold text-emerald-600">Modul 5-10 menit</p>
                                </div>
                                <p class="text-slate-600 text-sm leading-relaxed">Lesson bubble seperti Duolingo, selesai sebelum istirahat.</p>
                                <div class="mt-4 space-y-2">
                                    <div class="flex items-center gap-2 text-sm text-slate-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Python, HTML, CSS, JS</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-slate-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Unlock bertahap sesuai XP</span>
                                    </div>
                                </div>
                            </article>
                            <article class="rounded-3xl bg-white p-6 border border-emerald-100 shadow-lg hover:shadow-xl transition-all glow-emerald group">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-lime-400 to-emerald-600 flex items-center justify-center text-2xl shadow-lg">💻</div>
                                    <p class="text-lg font-bold text-emerald-600">Mobile Compiler</p>
                                </div>
                                <p class="text-slate-600 text-sm leading-relaxed">Editor mini powered by Alpine/Livewire.</p>
                                <div class="mt-4 space-y-2">
                                    <div class="flex items-center gap-2 text-sm text-slate-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Support HTML/CSS/JS & Python</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-slate-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                        <span>Status output real-time</span>
                                    </div>
                                </div>
                            </article>
                            <article class="rounded-3xl bg-gradient-to-br from-emerald-500 to-lime-500 text-white p-6 shadow-xl md:col-span-2 glow-emerald">
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="h-12 w-12 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-2xl">🎨</div>
                                    <p class="text-lg font-bold">Materi Visual & Interaktif</p>
                                </div>
                                <p class="text-white/90 text-sm leading-relaxed">Fill-in-the-blank, drag-drop blok logika, dan analogi yang mudah dipahami.</p>
                            </article>
                        </div>
                    </div>
                </section>

                <!-- Pilar 02: Gamification -->
                <section class="space-y-6" id="gamification">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-100 border border-amber-200">
                        <span class="text-2xl">🎮</span>
                        <p class="text-xs uppercase tracking-[0.4em] text-amber-700 font-bold">Pilar 02</p>
                    </div>
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                        <div class="lg:w-1/3 space-y-4">
                            <h2 class="text-4xl font-bold bg-gradient-to-r from-amber-600 to-orange-600 bg-clip-text text-transparent">Gamification & Retention</h2>
                            <p class="text-slate-600 text-lg leading-relaxed">Bakar semangat lewat streak, hearts, XP, dan badge yang membuat belajar jadi adiktif.</p>
                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-50 border border-amber-100">
                                <span class="h-2 w-2 rounded-full bg-amber-500 animate-pulse"></span>
                                <span class="text-sm font-semibold text-amber-700">Motivasi tinggi</span>
                            </div>
                        </div>
                        <div class="lg:flex-1 grid sm:grid-cols-2 gap-6">
                            <article class="rounded-3xl bg-white border border-amber-100 p-6 shadow-lg hover:shadow-xl transition-all glow-amber">
                                <div class="flex items-center justify-between mb-4">
                                    <p class="text-lg font-bold text-amber-600">Daily Streak</p>
                                    <span class="text-4xl">🔥</span>
                                </div>
                                <p class="text-sm text-slate-600 leading-relaxed">Reset kalau bolos sehari. Premium dapat item Streak Freeze.</p>
                                <div class="mt-4 px-4 py-2 rounded-xl bg-amber-50 border border-amber-100">
                                    <p class="text-xs font-semibold text-amber-700">💡 Fitur unggulan untuk konsistensi</p>
                                </div>
                            </article>
                            <article class="rounded-3xl bg-white border border-rose-100 p-6 shadow-lg hover:shadow-xl transition-all glow-rose">
                                <div class="flex items-center justify-between mb-4">
                                    <p class="text-lg font-bold text-rose-600">Hearts System</p>
                                    <span class="text-4xl">❤️</span>
                                </div>
                                <p class="text-sm text-slate-600 leading-relaxed">-1 tiap jawab salah, refill otomatis + rewarded ads.</p>
                                <div class="mt-4 px-4 py-2 rounded-xl bg-rose-50 border border-rose-100">
                                    <p class="text-xs font-semibold text-rose-700">💡 Mencegah spam dan meningkatkan fokus</p>
                                </div>
                            </article>
                            <article class="rounded-3xl bg-gradient-to-br from-amber-400 to-orange-500 text-white p-6 shadow-xl glow-amber">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-3xl">⭐</span>
                                    <p class="text-lg font-bold">XP & Level</p>
                                </div>
                                <p class="text-sm text-white/90 leading-relaxed">XP ledger untuk modul, challenge, ad reward. Level membuka modul lanjutan.</p>
                            </article>
                            <article class="rounded-3xl bg-gradient-to-br from-violet-500 to-purple-600 text-white p-6 shadow-xl glow-violet">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-3xl">🏅</span>
                                    <p class="text-lg font-bold">Badges</p>
                                </div>
                                <p class="text-sm text-white/90 leading-relaxed">Contoh: "Raja Python Pemula", "Frontend Master". Tampil di profil & leaderboard.</p>
                            </article>
                        </div>
                    </div>
                </section>

                <!-- Pilar 03: Social -->
                <section class="space-y-6" id="social">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-100 border border-sky-200">
                        <span class="text-2xl">👥</span>
                        <p class="text-xs uppercase tracking-[0.4em] text-sky-700 font-bold">Pilar 03</p>
                    </div>
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                        <div class="lg:w-1/3 space-y-4">
                            <h2 class="text-4xl font-bold bg-gradient-to-r from-sky-600 to-blue-600 bg-clip-text text-transparent">Social & Competition</h2>
                            <p class="text-slate-600 text-lg leading-relaxed">Leaderboard XP mingguan plus fitur add friends membuat kompetisi sehat antar kampus.</p>
                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-sky-50 border border-sky-100">
                                <span class="h-2 w-2 rounded-full bg-sky-500 animate-pulse"></span>
                                <span class="text-sm font-semibold text-sky-700">Komunitas aktif</span>
                            </div>
                        </div>
                        <div class="lg:flex-1 space-y-6">
                            <div class="rounded-[32px] bg-white border border-sky-100 p-8 shadow-xl glow-sky">
                                <div class="flex items-center gap-3 mb-6">
                                    <span class="text-4xl">🏆</span>
                                    <div>
                                        <p class="text-xl font-bold text-sky-600">Leaderboard</p>
                                        <p class="text-sm text-slate-500">Global • Kampus • Teman</p>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between px-4 py-3 rounded-2xl bg-sky-50 border border-sky-100">
                                        <p class="font-semibold text-slate-800">Top 10 Global</p>
                                        <p class="text-emerald-600 font-semibold text-sm">Reset Senin</p>
                                    </div>
                                    <p class="text-slate-600 text-sm">Filter kampus (ITS, UNAIR, PENS, dll) & snapshot antar kampus untuk sponsor.</p>
                                </div>
                            </div>
                            <div class="rounded-[32px] bg-gradient-to-br from-slate-900 to-slate-800 text-white p-8 shadow-2xl">
                                <div class="flex items-center gap-3 mb-6">
                                    <span class="text-4xl">🤝</span>
                                    <div>
                                        <p class="text-xl font-bold">Add Friends</p>
                                        <p class="text-sm text-white/70">Follow teman, pantau streak</p>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <div class="flex items-center justify-between bg-white/10 backdrop-blur-sm rounded-2xl px-4 py-3 border border-white/20">
                                        <div>
                                            <p class="font-semibold">@reza.codes</p>
                                            <p class="text-xs text-white/70">Streak 15 🔥</p>
                                        </div>
                                        <button class="px-4 py-2 text-xs bg-emerald-500 text-white rounded-full font-semibold shadow-lg hover:bg-emerald-400 transition-all">Tambah</button>
                                    </div>
                                    <div class="flex items-center justify-between bg-white/10 backdrop-blur-sm rounded-2xl px-4 py-3 border border-white/20">
                                        <div>
                                            <p class="font-semibold">@shinta.dev</p>
                                            <p class="text-xs text-white/70">XP minggu ini 720</p>
                                        </div>
                                        <button class="px-4 py-2 text-xs bg-emerald-500 text-white rounded-full font-semibold shadow-lg hover:bg-emerald-400 transition-all">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Pilar 04: Talent Pool -->
                <section class="space-y-6" id="talent">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-violet-100 border border-violet-200">
                        <span class="text-2xl">💼</span>
                        <p class="text-xs uppercase tracking-[0.4em] text-violet-700 font-bold">Pilar 04</p>
                    </div>
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                        <div class="lg:w-1/3 space-y-4">
                            <h2 class="text-4xl font-bold bg-gradient-to-r from-violet-600 to-purple-600 bg-clip-text text-transparent">Karier & Portofolio</h2>
                            <p class="text-slate-600 text-lg leading-relaxed">Mahasiswa otomatis punya mini portfolio + sponsor punya dashboard talent pool.</p>
                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-violet-50 border border-violet-100">
                                <span class="h-2 w-2 rounded-full bg-violet-500 animate-pulse"></span>
                                <span class="text-sm font-semibold text-violet-700">Jembatan ke industri</span>
                            </div>
                        </div>
                        <div class="lg:flex-1 grid md:grid-cols-2 gap-6">
                            <article class="rounded-3xl bg-white border border-violet-100 p-6 shadow-lg hover:shadow-xl transition-all glow-violet">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="text-4xl">📄</span>
                                    <p class="text-lg font-bold text-violet-600">Profil Portofolio Mini</p>
                                </div>
                                <p class="text-sm text-slate-600 mb-4 leading-relaxed">Ringkas progress XP, badge, streak, dan project mini. Bisa diunduh PDF.</p>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2 text-sm text-slate-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-violet-500"></span>
                                        <span>Highlight skill & level</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-slate-700">
                                        <span class="h-1.5 w-1.5 rounded-full bg-violet-500"></span>
                                        <span>Tautan demo & repo</span>
                                    </div>
                                </div>
                            </article>
                            <article class="rounded-3xl bg-gradient-to-br from-violet-500 to-purple-600 text-white p-6 shadow-xl glow-violet">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="text-4xl">🎯</span>
                                    <p class="text-lg font-bold">Talent Pool Dashboard</p>
                                </div>
                                <p class="text-sm text-white/90 mb-4 leading-relaxed">Role khusus company/sponsor untuk filter XP tertinggi.</p>
                                <div class="space-y-2">
                                    <div class="flex items-center gap-2 text-sm text-white/90">
                                        <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
                                        <span>Filter kampus, skill, availability</span>
                                    </div>
                                    <div class="flex items-center gap-2 text-sm text-white/90">
                                        <span class="h-1.5 w-1.5 rounded-full bg-white"></span>
                                        <span>Shortlist & hubungi kandidat</span>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </section>

                <!-- Pilar 05: Monetization -->
                <section class="space-y-6" id="monetize">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-rose-100 border border-rose-200">
                        <span class="text-2xl">💰</span>
                        <p class="text-xs uppercase tracking-[0.4em] text-rose-700 font-bold">Pilar 05</p>
                    </div>
                    <div class="flex flex-col gap-6 lg:flex-row lg:items-start">
                        <div class="lg:w-1/3 space-y-4">
                            <h2 class="text-4xl font-bold bg-gradient-to-r from-rose-600 to-orange-600 bg-clip-text text-transparent">Monetisasi Freemium</h2>
                            <p class="text-slate-600 text-lg leading-relaxed">Rewarded ads untuk user gratis, subscription terjangkau untuk mahasiswa.</p>
                            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-rose-50 border border-rose-100">
                                <span class="h-2 w-2 rounded-full bg-rose-500 animate-pulse"></span>
                                <span class="text-sm font-semibold text-rose-700">Sustainable revenue</span>
                            </div>
                        </div>
                        <div class="lg:flex-1 grid md:grid-cols-2 gap-6">
                            <article class="rounded-[32px] bg-gradient-to-br from-orange-400 via-rose-400 to-amber-400 text-white p-8 shadow-2xl glow-rose">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="text-4xl">🎬</span>
                                    <p class="text-xl font-bold">Rewarded Ads</p>
                                </div>
                                <div class="space-y-3 text-sm text-white/95">
                                    <div class="flex items-start gap-2">
                                        <span class="text-lg">✓</span>
                                        <span>+1 heart atau XP 2x setelah nonton 15 detik</span>
                                    </div>
                                    <div class="flex items-start gap-2">
                                        <span class="text-lg">✓</span>
                                        <span>Cooldown 30 menit tercatat di ledger</span>
                                    </div>
                                    <div class="flex items-start gap-2">
                                        <span class="text-lg">✓</span>
                                        <span>Integrasi AdMob / Unity Ads</span>
                                    </div>
                                </div>
                            </article>
                            <article class="rounded-[32px] bg-white border border-emerald-200 p-8 shadow-xl glow-emerald">
                                <div class="flex items-center gap-3 mb-4">
                                    <span class="text-4xl">👑</span>
                                    <div>
                                        <p class="text-xl font-bold text-emerald-600">Premium</p>
                                        <p class="text-sm text-slate-500">Rp29K/bulan</p>
                                    </div>
                                </div>
                                <div class="space-y-3 text-sm text-slate-700 mb-6">
                                    <div class="flex items-start gap-2">
                                        <span class="text-emerald-500 text-lg">✓</span>
                                        <span>Unlimited Hearts</span>
                                    </div>
                                    <div class="flex items-start gap-2">
                                        <span class="text-emerald-500 text-lg">✓</span>
                                        <span>Ad-Free experience</span>
                                    </div>
                                    <div class="flex items-start gap-2">
                                        <span class="text-emerald-500 text-lg">✓</span>
                                        <span>Streak Freeze otomatis 1x per minggu</span>
                                    </div>
                                </div>
                                <button class="w-full px-4 py-3 rounded-2xl bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-semibold shadow-lg shadow-emerald-500/50 hover:shadow-emerald-500/70 transition-all">Aktifkan Premium</button>
                            </article>
                        </div>
                    </div>
                </section>
            </main>

            <footer class="px-6 sm:px-10 lg:px-16 py-10 border-t border-slate-200 text-sm text-slate-500 text-center">
                <p>© {{ date('Y') }} Techno · Platform belajar coding gamified untuk mahasiswa Indonesia.</p>
            </footer>
        </div>
    </body>
</html>
