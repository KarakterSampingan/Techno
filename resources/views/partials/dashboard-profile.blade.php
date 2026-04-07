@php
    $user = auth()->user();
    $badges = [
        ['name' => 'Si Paling Ngotek', 'icon' => '🛠', 'earned' => true],
        ['name' => 'Raja Python', 'icon' => '🐍', 'earned' => true],
        ['name' => 'CSS Styler', 'icon' => '🎨', 'earned' => true],
        ['name' => 'Streak 7 Hari', 'icon' => '🔥', 'earned' => true],
        ['name' => 'Logic Slayer', 'icon' => '🧠', 'earned' => false],
        ['name' => 'Talent Scout', 'icon' => '💼', 'earned' => false],
    ];
    $skills = [
        ['label' => 'HTML', 'value' => 82],
        ['label' => 'CSS', 'value' => 75],
        ['label' => 'JS', 'value' => 68],
        ['label' => 'Python', 'value' => 60],
    ];
@endphp

<div class="grid lg:grid-cols-[1.4fr,0.8fr] gap-6">
    <section class="space-y-6">
        <article class="rounded-[32px] bg-white/5 border border-white/10 p-6 flex flex-col gap-6">
            <div class="flex flex-wrap items-center gap-4">
                <div class="h-16 w-16 rounded-2xl bg-gradient-to-br from-emerald-400 to-lime-400 flex items-center justify-center text-2xl font-bold text-slate-900">
                    {{ strtoupper(substr($user->name ?? 'T', 0, 1)) }}
                </div>
                <div>
                    <p class="text-xs uppercase tracking-[0.5em] text-white/50">Mini Portofolio</p>
                    <p class="text-2xl font-semibold">{{ $user->name ?? 'Tanpa Nama' }}</p>
                    <p class="text-sm text-white/60">{{ $user->campus ?? 'Kampus Surabaya' }}</p>
                </div>
                <span class="ml-auto px-4 py-2 rounded-full text-xs bg-emerald-500/20 text-emerald-200">XP Total: 4.320</span>
            </div>
            <div class="grid sm:grid-cols-3 gap-4 text-sm font-semibold">
                <div class="rounded-2xl bg-white/5 border border-white/10 px-4 py-3">
                    <p class="text-white/60 text-xs uppercase tracking-[0.3em]">Streak</p>
                    <p class="text-2xl text-amber-300">12 🔥</p>
                </div>
                <div class="rounded-2xl bg-white/5 border border-white/10 px-4 py-3">
                    <p class="text-white/60 text-xs uppercase tracking-[0.3em]">Hearts</p>
                    <p class="text-2xl text-rose-300">4 / 5</p>
                </div>
                <div class="rounded-2xl bg-white/5 border border-white/10 px-4 py-3">
                    <p class="text-white/60 text-xs uppercase tracking-[0.3em]">Badge</p>
                    <p class="text-2xl text-emerald-300">6</p>
                </div>
            </div>
            <div class="rounded-3xl bg-slate-900/60 border border-white/10 p-5">
                <div class="flex items-center justify-between text-sm">
                    <p class="font-semibold text-white/80">Jejak Belajar</p>
                    <a href="#" class="text-emerald-300 text-xs underline">Unduh Portofolio (PDF)</a>
                </div>
                <p class="text-sm text-white/60 mt-2">Timeline otomatis narik XP, streak, dan project mini buat di-share ke HRD.</p>
            </div>
        </article>

        <article class="rounded-[32px] bg-white/5 border border-white/10 p-6">
            <header class="flex items-center justify-between">
                <p class="text-xs uppercase tracking-[0.4em] text-white/40">Badge Koleksi</p>
                <a href="/premium" class="text-xs font-semibold text-emerald-300 underline">Lihat semua</a>
            </header>
            <div class="mt-4 grid sm:grid-cols-3 gap-4">
                @foreach ($badges as $badge)
                    <div class="rounded-2xl bg-slate-900/60 border border-white/10 px-4 py-5 text-center {{ $badge['earned'] ? '' : 'badge-locked' }}">
                        <p class="text-3xl mb-2">{{ $badge['icon'] }}</p>
                        <p class="text-sm font-semibold text-white/80">{{ $badge['name'] }}</p>
                    </div>
                @endforeach
            </div>
            <p class="mt-4 text-xs text-white/50">Badge abu-abu = belum kebuka. Gas modul lanjut supaya kebuka kabeh.</p>
        </article>

        <article class="rounded-[32px] bg-white/5 border border-white/10 p-6 space-y-5">
            <header class="flex items-center justify-between">
                <p class="text-xs uppercase tracking-[0.4em] text-white/40">Skill Matrix</p>
                <span class="px-3 py-1 rounded-full bg-white/10 text-xs text-white/70">Update realtime</span>
            </header>
            <div class="space-y-4">
                @foreach ($skills as $skill)
                    <div class="flex items-center gap-3 text-sm">
                        <span class="w-16 text-white/70">{{ $skill['label'] }}</span>
                        <div class="flex-1 h-2 rounded-full bg-white/10 overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-emerald-400 to-lime-400" style="width: {{ $skill['value'] }}%"></div>
                        </div>
                        <span class="text-white/50">{{ $skill['value'] }}%</span>
                    </div>
                @endforeach
            </div>
            <div class="rounded-2xl bg-emerald-500/10 border border-emerald-500/30 px-4 py-3 text-sm text-emerald-100">
                Sponsor bakal liat skill chart ini di Talent Pool dashboard. Pastikan bar-mu terus maju.
            </div>
        </article>
    </section>

    <aside class="space-y-6">
        <article class="rounded-[32px] bg-gradient-to-br from-fuchsia-600/70 to-emerald-500/70 border border-white/10 p-6 space-y-4">
            <p class="text-xs uppercase tracking-[0.4em] text-white/80">Talent Pool Snapshot</p>
            <div class="flex items-center gap-3">
                <div class="flex-1">
                    <p class="text-sm text-white/70">Status</p>
                    <p class="text-2xl font-semibold">Terbuka Magang</p>
                </div>
                <span class="px-3 py-1 rounded-full bg-white/10 text-xs">XP 4.320</span>
            </div>
            <ul class="text-sm space-y-2 text-white/80">
                <li>• Project unggulan: Kampus Meal Planner</li>
                <li>• Link demo & repo siap share</li>
                <li>• Sertifikat HTML & CSS</li>
            </ul>
            <button class="w-full px-4 py-3 rounded-2xl bg-white text-slate-900 font-semibold">Share Profil ke Sponsor</button>
        </article>

        <article class="rounded-[32px] bg-white/5 border border-white/10 p-6 space-y-4">
            <p class="text-xs uppercase tracking-[0.4em] text-white/40">Premium Boost</p>
            <h3 class="text-2xl font-semibold text-white">Upgrade Premium: Bebas Iklan & Streak Freeze</h3>
            <p class="text-sm text-white/70">Rp25.000/bulan bisa dapet unlimited hearts, item Streak Freeze, plus badge eksklusif "Si Paling Loyal".</p>
            <div class="flex flex-col gap-3">
                <a href="/premium" class="w-full px-5 py-3 rounded-2xl bg-emerald-500 text-slate-900 font-semibold text-center">Lihat Paket Premium</a>
                <a href="/premium" class="w-full px-5 py-3 rounded-2xl border border-white/20 text-white/80 font-semibold text-center">Bandingkan Fitur</a>
            </div>
        </article>
    </aside>
</div>
