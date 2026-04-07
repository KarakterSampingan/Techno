@php
    $leaderboards = [
        'global' => [
            ['rank' => 1, 'name' => 'Alya', 'campus' => 'ITS', 'xp' => 980, 'streak' => 18, 'badge' => 'Si Paling Ngotek'],
            ['rank' => 2, 'name' => 'Reno', 'campus' => 'UPN', 'xp' => 920, 'streak' => 15, 'badge' => 'Raja Python'],
            ['rank' => 3, 'name' => 'Lala', 'campus' => 'UNESA', 'xp' => 870, 'streak' => 14, 'badge' => 'CSS Styler'],
            ['rank' => 4, 'name' => 'Yudha', 'campus' => 'PENS', 'xp' => 840, 'streak' => 11, 'badge' => 'Logic Slayer'],
            ['rank' => 5, 'name' => 'Shawn', 'campus' => 'UK Petra', 'xp' => 790, 'streak' => 10, 'badge' => 'Bug Hunter'],
        ],
        'kampus' => [
            ['rank' => 1, 'name' => 'Alya', 'campus' => 'ITS', 'xp' => 980, 'streak' => 18, 'badge' => 'Captain ITS'],
            ['rank' => 2, 'name' => 'Dira', 'campus' => 'ITS', 'xp' => 860, 'streak' => 12, 'badge' => 'Flexbox Hero'],
            ['rank' => 3, 'name' => 'Rafi', 'campus' => 'ITS', 'xp' => 820, 'streak' => 9, 'badge' => 'Microcopy Master'],
            ['rank' => 4, 'name' => 'Sita', 'campus' => 'ITS', 'xp' => 790, 'streak' => 11, 'badge' => 'Tailwind Racer'],
            ['rank' => 5, 'name' => 'Bagus', 'campus' => 'ITS', 'xp' => 755, 'streak' => 8, 'badge' => 'Compiler Ninja'],
        ],
        'friends' => [
            ['rank' => 1, 'name' => 'Mega', 'campus' => 'UNAIR', 'xp' => 620, 'streak' => 9, 'badge' => 'Squad Warden'],
            ['rank' => 2, 'name' => 'Reza', 'campus' => 'PENS', 'xp' => 590, 'streak' => 8, 'badge' => 'Daily Grinder'],
            ['rank' => 3, 'name' => 'Shawn', 'campus' => 'UK Petra', 'xp' => 560, 'streak' => 6, 'badge' => 'Bug Hunter'],
            ['rank' => 4, 'name' => 'Tina', 'campus' => 'ITS', 'xp' => 510, 'streak' => 7, 'badge' => 'XP Booster'],
            ['rank' => 5, 'name' => 'Riko', 'campus' => 'UPN', 'xp' => 490, 'streak' => 5, 'badge' => 'Streak Buddy'],
        ],
    ];

    $filterLabels = [
        'global' => 'Global',
        'kampus' => 'Kampus (ITS)',
        'friends' => 'Teman',
    ];
@endphp

<div
    class="space-y-8"
    x-data="{
        tab: 'global',
        boards: @js($leaderboards),
        filters: @js($filterLabels),
        get current() { return this.boards[this.tab] ?? []; },
        podiumEmoji(index) { return ['🥇','🥈','🥉'][index] ?? '⭐'; }
    }"
>
    <div class="flex flex-wrap items-center gap-3 justify-between">
        <div class="flex flex-wrap gap-2">
            <template x-for="(label, key) in filters" :key="key">
                <button
                    class="px-4 py-2 rounded-full text-sm font-semibold transition"
                    @click="tab = key"
                    :class="tab === key ? 'bg-emerald-500 text-slate-900 shadow shadow-emerald-500/40' : 'bg-white/10 text-white/60 hover:text-white'"
                    x-text="label"
                ></button>
            </template>
        </div>
        <button class="px-4 py-2 rounded-full bg-white/10 border border-white/20 text-sm font-semibold text-white/80 hover:text-white">+ Tambah Konco</button>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <article class="rounded-[32px] bg-gradient-to-br from-indigo-600/80 to-emerald-500/60 border border-white/10 p-6">
            <header class="flex items-center justify-between text-sm text-white/80">
                <p class="tracking-[0.4em] uppercase">Podium</p>
                <p class="font-semibold" x-text="filters[tab]"></p>
            </header>
            <div class="mt-6 grid sm:grid-cols-3 gap-4 text-center">
                <template x-for="(player, index) in current.slice(0,3)" :key="player.name">
                    <div class="rounded-3xl bg-white/10 border border-white/20 px-4 py-6 flex flex-col items-center gap-2">
                        <span class="text-3xl" x-text="podiumEmoji(index)"></span>
                        <p class="text-lg font-semibold" x-text="player.name"></p>
                        <p class="text-sm text-white/60" x-text="player.campus"></p>
                        <p class="text-sm text-emerald-300 font-semibold" x-text="player.xp + ' XP'"></p>
                        <span class="text-xs px-3 py-1 rounded-full bg-white/10" x-text="player.badge"></span>
                    </div>
                </template>
            </div>
            <p class="mt-5 text-xs text-white/70 text-center">Leaderboard reset setiap Senin jam 05.00 WIB.</p>
        </article>

        <article class="rounded-[32px] bg-white/5 border border-white/10 p-6">
            <header class="flex items-center justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.4em] text-white/40">Daftar Lengkap</p>
                    <p class="text-lg font-semibold" x-text="filters[tab] + ' XP Mingguan'"></p>
                </div>
                <span class="px-3 py-1 rounded-full text-xs bg-white/10 text-white/70">Season #18</span>
            </header>
            <ul class="mt-4 divide-y divide-white/5 text-sm">
                <template x-for="player in current" :key="player.rank">
                    <li class="flex items-center gap-3 py-3">
                        <div class="h-10 w-10 rounded-full bg-white/5 flex items-center justify-center font-semibold text-emerald-400" x-text="player.rank"></div>
                        <div class="flex-1">
                            <p class="font-semibold text-white" x-text="player.name + ' · ' + player.campus"></p>
                            <p class="text-xs text-white/50" x-text="player.badge + ' • Streak ' + player.streak + '🔥'"></p>
                        </div>
                        <p class="font-semibold text-emerald-300" x-text="player.xp + ' XP'"></p>
                    </li>
                </template>
            </ul>
            <p class="mt-4 text-xs text-white/60">Sponsor bisa export data leaderboard buat Talent Pool.</p>
        </article>
    </div>
</div>
