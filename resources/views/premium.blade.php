<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Techno · Premium Mahasiswa</title>
        <meta name="description" content="Detail benefit Techno Premium untuk mahasiswa Indonesia" />
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: { sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'] },
                        colors: {
                            premium: {
                                dark: '#0b0f1a',
                                gold: '#facc15',
                                rose: '#f472b6',
                            },
                        },
                    },
                },
            };
        </script>
        <style>
            body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
            .glow-gold { box-shadow: 0 0 60px rgba(250, 204, 21, 0.4); }
            .glow-blue { box-shadow: 0 0 60px rgba(59, 130, 246, 0.4); }
        </style>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
    </head>
    <body class="bg-gradient-to-br from-slate-900 via-slate-800 to-emerald-900 text-white min-h-screen">
        @include('components.page-loader')
        <header class="border-b border-white/10 bg-black/40 backdrop-blur-md sticky top-0 z-20">
            <div class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-amber-300 to-rose-400 flex items-center justify-center text-xl font-bold text-slate-900 shadow-lg group-hover:shadow-amber-400/50 transition-all">T</div>
                    <div>
                        <p class="text-lg font-semibold">Techno Premium</p>
                        <p class="text-xs uppercase tracking-[0.4em] text-white/60">Unlimited Learning</p>
                    </div>
                </a>
                <div class="flex gap-3">
                    <a href="/auth#register" class="px-4 py-2 rounded-full border border-white/30 text-sm font-semibold text-white/80 hover:text-white hover:border-white/50 transition-all">Daftar</a>
                    <a href="/auth" class="px-4 py-2 rounded-full bg-gradient-to-r from-amber-400 to-amber-500 text-slate-900 text-sm font-semibold shadow-lg hover:shadow-amber-400/50 transition-all">Masuk</a>
                </div>
            </div>
        </header>
        
        <main class="max-w-6xl mx-auto px-6 py-12 space-y-12">
            <!-- Hero Section -->
            <section class="rounded-[40px] bg-gradient-to-br from-amber-300 via-rose-200 to-emerald-200 text-slate-900 p-10 shadow-2xl glow-gold">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/40 backdrop-blur-sm mb-4">
                    <span class="text-xl">👑</span>
                    <p class="text-xs uppercase tracking-[0.5em] font-bold">Paket Mahasiswa</p>
                </div>
                <h1 class="text-5xl font-bold mt-3 leading-tight">Unlimited Hearts, Streak Freeze, XP booster 2x tiap weekend.</h1>
                <p class="text-lg mt-4 max-w-3xl text-slate-800">Techno Premium didesain untuk kamu yang ingin push leaderboard tanpa takut kehabisan nyawa. Tersedia paket reguler dan subsidi pemerintah.</p>
                <div class="mt-6 flex flex-wrap gap-3 text-sm font-semibold">
                    <span class="px-4 py-2 rounded-full bg-white/40 backdrop-blur-sm border border-white/60">❤️ Unlimited Hearts</span>
                    <span class="px-4 py-2 rounded-full bg-white/40 backdrop-blur-sm border border-white/60">🚫 Ad-Free Experience</span>
                    <span class="px-4 py-2 rounded-full bg-white/40 backdrop-blur-sm border border-white/60">🔥 Auto Streak Freeze</span>
                    <span class="px-4 py-2 rounded-full bg-white/40 backdrop-blur-sm border border-white/60">⚡ XP Booster 2x</span>
                </div>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="#pricing" class="px-6 py-3 rounded-2xl bg-slate-900 text-white font-semibold shadow-xl hover:bg-slate-800 transition-all">Lihat Paket</a>
                    <a href="/#gamification" class="px-6 py-3 rounded-2xl border-2 border-slate-900 text-slate-900 font-semibold hover:bg-slate-900 hover:text-white transition-all">Lihat Demo Fitur</a>
                </div>
            </section>

            <!-- Benefits Grid -->
            <section class="grid md:grid-cols-3 gap-6">
                <article class="rounded-3xl bg-white/5 backdrop-blur-sm border border-white/10 p-6 space-y-4 hover:bg-white/10 transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-rose-400 to-rose-600 flex items-center justify-center text-3xl shadow-lg">❤️</div>
                    <p class="text-sm uppercase tracking-[0.4em] text-white/60 font-semibold">Benefit Inti</p>
                    <ul class="space-y-2 text-sm text-white/80">
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Nyawa unlimited tanpa nunggu refill</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Streak freeze otomatis sekali sehari</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>XP booster 2x saat weekend & event</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Bebas iklan & pop-up rewarded ads</span>
                        </li>
                    </ul>
                </article>
                <article class="rounded-3xl bg-white/5 backdrop-blur-sm border border-white/10 p-6 space-y-4 hover:bg-white/10 transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-violet-400 to-violet-600 flex items-center justify-center text-3xl shadow-lg">💼</div>
                    <p class="text-sm uppercase tracking-[0.4em] text-white/60 font-semibold">Bonus Karier</p>
                    <ul class="space-y-2 text-sm text-white/80">
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Profil premium otomatis di talent pool</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Template portofolio siap unduh (PDF)</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Sertifikat digital tiap track tamat</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Badge eksklusif "Premium Member"</span>
                        </li>
                    </ul>
                </article>
                <article class="rounded-3xl bg-white/5 backdrop-blur-sm border border-white/10 p-6 space-y-4 hover:bg-white/10 transition-all">
                    <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-3xl shadow-lg">🎯</div>
                    <p class="text-sm uppercase tracking-[0.4em] text-white/60 font-semibold">Fitur Eksklusif</p>
                    <ul class="space-y-2 text-sm text-white/80">
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Akses early ke modul baru</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Priority support via chat</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Custom avatar & theme</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-400">✓</span>
                            <span>Leaderboard premium exclusive</span>
                        </li>
                    </ul>
                </article>
            </section>

            <!-- Pricing Section -->
            <section id="pricing" class="space-y-8">
                <div class="text-center space-y-3">
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-amber-400 to-rose-400 bg-clip-text text-transparent">Pilih Paket yang Sesuai</h2>
                    <p class="text-white/70 text-lg">Tersedia paket reguler dan subsidi pemerintah untuk mahasiswa</p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Paket Bulanan -->
                    <article class="rounded-3xl bg-white/5 backdrop-blur-sm border border-white/10 p-8 space-y-6 hover:border-amber-400/50 transition-all">
                        <div>
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-500/20 border border-amber-400/30 mb-4">
                                <span class="text-sm font-semibold text-amber-300">Bulanan</span>
                            </div>
                            <h3 class="text-4xl font-bold text-white">Rp25.000</h3>
                            <p class="text-white/60 text-sm mt-1">per bulan</p>
                        </div>
                        <p class="text-white/70 text-sm">Cocok untuk mencoba fitur premium selama sebulan penuh.</p>
                        <ul class="space-y-2 text-sm text-white/80">
                            <li class="flex items-start gap-2">
                                <span class="text-emerald-400">✓</span>
                                <span>Semua fitur premium</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-emerald-400">✓</span>
                                <span>Bisa cancel kapan saja</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-emerald-400">✓</span>
                                <span>Pembayaran otomatis</span>
                            </li>
                        </ul>
                        <a href="/auth#register" class="block w-full px-5 py-3 rounded-2xl bg-white/10 border border-white/20 text-white text-center font-semibold hover:bg-white/20 transition-all">Pilih Paket</a>
                    </article>

                    <!-- Paket Semester (Popular) -->
                    <article class="rounded-3xl bg-gradient-to-br from-amber-500/20 to-rose-500/20 backdrop-blur-sm border-2 border-amber-400 p-8 space-y-6 relative glow-gold transform scale-105">
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-gradient-to-r from-amber-400 to-amber-500 text-slate-900 text-xs font-bold uppercase tracking-wider shadow-lg">
                            Paling Populer
                        </div>
                        <div>
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-amber-400/30 border border-amber-400/50 mb-4">
                                <span class="text-sm font-semibold text-amber-200">Semester</span>
                            </div>
                            <h3 class="text-4xl font-bold text-white">Rp125.000</h3>
                            <p class="text-white/60 text-sm mt-1">6 bulan • Hemat 20%</p>
                        </div>
                        <p class="text-white/80 text-sm">Hemat Rp25.000 + badge eksklusif "Si Paling Loyal".</p>
                        <ul class="space-y-2 text-sm text-white/90">
                            <li class="flex items-start gap-2">
                                <span class="text-amber-300">✓</span>
                                <span>Semua fitur premium</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-amber-300">✓</span>
                                <span>Badge "Si Paling Loyal"</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-amber-300">✓</span>
                                <span>Diskon 20% dari harga bulanan</span>
                            </li>
                        </ul>
                        <a href="/auth#register" class="block w-full px-5 py-3 rounded-2xl bg-gradient-to-r from-amber-400 to-amber-500 text-slate-900 text-center font-bold shadow-xl hover:shadow-amber-400/50 transition-all">Pilih Paket</a>
                    </article>

                    <!-- Paket Subsidi Pemerintah -->
                    <article class="rounded-3xl bg-gradient-to-br from-blue-500/20 to-cyan-500/20 backdrop-blur-sm border-2 border-blue-400 p-8 space-y-6 glow-blue">
                        <div>
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-500/30 border border-blue-400/50 mb-4">
                                <span class="text-lg">🇮🇩</span>
                                <span class="text-sm font-semibold text-blue-200">Subsidi Pemerintah</span>
                            </div>
                            <h3 class="text-4xl font-bold text-white">Rp10.000</h3>
                            <p class="text-white/60 text-sm mt-1">per bulan • Subsidi 60%</p>
                        </div>
                        <p class="text-white/80 text-sm">Khusus mahasiswa dengan KIP Kuliah atau program subsidi pemerintah.</p>
                        <ul class="space-y-2 text-sm text-white/90">
                            <li class="flex items-start gap-2">
                                <span class="text-blue-300">✓</span>
                                <span>Semua fitur premium</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-blue-300">✓</span>
                                <span>Badge "Penerima Subsidi"</span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="text-blue-300">✓</span>
                                <span>Verifikasi KIP/KTM diperlukan</span>
                            </li>
                        </ul>
                        <a href="/auth#register" class="block w-full px-5 py-3 rounded-2xl bg-gradient-to-r from-blue-500 to-cyan-500 text-white text-center font-bold shadow-xl hover:shadow-blue-400/50 transition-all">Daftar Subsidi</a>
                        <div class="px-4 py-3 rounded-2xl bg-blue-500/10 border border-blue-400/30">
                            <p class="text-xs text-blue-200 leading-relaxed">
                                <span class="font-semibold">📋 Syarat:</span> Upload KIP Kuliah atau surat keterangan dari kampus untuk verifikasi.
                            </p>
                        </div>
                    </article>
                </div>

                <!-- Info Subsidi -->
                <div class="rounded-3xl bg-gradient-to-r from-blue-500/10 to-cyan-500/10 border border-blue-400/30 p-8">
                    <div class="flex items-start gap-4">
                        <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-blue-400 to-cyan-500 flex items-center justify-center text-2xl shadow-lg flex-shrink-0">🎓</div>
                        <div class="space-y-3">
                            <h3 class="text-xl font-bold text-white">Program Subsidi Pemerintah</h3>
                            <p class="text-white/70 text-sm leading-relaxed">
                                Techno bekerja sama dengan Kementerian Pendidikan untuk memberikan akses premium dengan harga terjangkau bagi mahasiswa penerima KIP Kuliah dan program subsidi lainnya. Tujuannya adalah meningkatkan keterampilan digital mahasiswa Indonesia secara merata.
                            </p>
                            <div class="grid sm:grid-cols-2 gap-4 mt-4">
                                <div class="flex items-start gap-2 text-sm text-white/80">
                                    <span class="text-blue-400">•</span>
                                    <span>Subsidi 60% dari harga reguler</span>
                                </div>
                                <div class="flex items-start gap-2 text-sm text-white/80">
                                    <span class="text-blue-400">•</span>
                                    <span>Verifikasi otomatis via PDDIKTI</span>
                                </div>
                                <div class="flex items-start gap-2 text-sm text-white/80">
                                    <span class="text-blue-400">•</span>
                                    <span>Berlaku untuk semua kampus di Indonesia</span>
                                </div>
                                <div class="flex items-start gap-2 text-sm text-white/80">
                                    <span class="text-blue-400">•</span>
                                    <span>Perpanjangan otomatis setiap semester</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- FAQ Section -->
            <section class="space-y-6">
                <h2 class="text-3xl font-bold text-center">Pertanyaan Umum</h2>
                <div class="space-y-4">
                    <details class="rounded-2xl bg-white/5 border border-white/10 p-6 group">
                        <summary class="font-semibold cursor-pointer list-none flex items-center justify-between">
                            <span>Bagaimana cara mendaftar paket subsidi?</span>
                            <span class="text-2xl group-open:rotate-180 transition-transform">›</span>
                        </summary>
                        <p class="text-white/70 text-sm mt-4 leading-relaxed">
                            Daftar akun Techno, pilih paket subsidi, lalu upload foto KIP Kuliah atau surat keterangan dari kampus. Tim kami akan verifikasi dalam 1x24 jam.
                        </p>
                    </details>
                    <details class="rounded-2xl bg-white/5 border border-white/10 p-6 group">
                        <summary class="font-semibold cursor-pointer list-none flex items-center justify-between">
                            <span>Apakah bisa upgrade dari paket bulanan ke semester?</span>
                            <span class="text-2xl group-open:rotate-180 transition-transform">›</span>
                        </summary>
                        <p class="text-white/70 text-sm mt-4 leading-relaxed">
                            Bisa! Sisa hari dari paket bulanan akan dihitung sebagai kredit untuk paket semester.
                        </p>
                    </details>
                    <details class="rounded-2xl bg-white/5 border border-white/10 p-6 group">
                        <summary class="font-semibold cursor-pointer list-none flex items-center justify-between">
                            <span>Apakah subsidi berlaku selamanya?</span>
                            <span class="text-2xl group-open:rotate-180 transition-transform">›</span>
                        </summary>
                        <p class="text-white/70 text-sm mt-4 leading-relaxed">
                            Subsidi berlaku selama kamu masih terdaftar sebagai mahasiswa aktif dan penerima KIP Kuliah. Verifikasi ulang dilakukan setiap semester.
                        </p>
                    </details>
                </div>
            </section>
        </main>

        <footer class="border-t border-white/10 py-8 text-center text-sm text-white/60">
            <p>© {{ date('Y') }} Techno · Platform belajar coding gamified untuk mahasiswa Indonesia.</p>
        </footer>
    </body>
</html>
