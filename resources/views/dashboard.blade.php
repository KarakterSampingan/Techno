<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Techno · Dashboard</title>
        <meta name="description" content="Dashboard gamified Techno untuk laptop & mobile" />
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: { sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'] },
                        colors: {
                            techno: {
                                bg: '#020412',
                                card: '#0f172a',
                                neon: '#5ef38c',
                                purple: '#a855f7',
                                gold: '#fbbf24',
                            },
                        },
                    },
                },
            };
        </script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
        <style>
            body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
            .map-grid {
                background-image: radial-gradient(circle at 1px 1px, rgba(255,255,255,0.08) 1px, transparent 0);
                background-size: 40px 40px;
            }
            .node-glow { box-shadow: 0 0 25px rgba(94, 243, 140, 0.45); }
            .nav-pill-active { box-shadow: 0 0 15px rgba(94, 243, 140, 0.4); }
            .badge-locked { filter: grayscale(1); opacity: 0.3; }
        </style>
    </head>
    <body class="bg-techno-bg text-white min-h-screen" x-data="dashboardApp()">
        @php
            $journeyModules = [
                [
                    'slug' => 'html-fast-track',
                    'title' => 'Intro HTML',
                    'level' => 1,
                    'xp' => 80,
                    'duration' => '6 menit',
                    'status' => 'done',
                    'summary' => 'Belajar struktur tag dasar & semantic element.',
                    'top' => '78%',
                    'left' => '12%',
                    'requires' => [],
                ],
                [
                    'slug' => 'css-micro-interactions',
                    'title' => 'CSS Micro',
                    'level' => 2,
                    'xp' => 120,
                    'duration' => '8 menit',
                    'status' => 'active',
                    'summary' => 'Utility Tailwind & animasi keyframes untuk CTA.',
                    'top' => '60%',
                    'left' => '38%',
                    'requires' => ['html-fast-track'],
                ],
                [
                    'slug' => 'treasure',
                    'title' => 'Treasure Chest',
                    'level' => 'Reward',
                    'xp' => 0,
                    'duration' => '',
                    'status' => 'reward',
                    'summary' => 'Badge & refill hearts.',
                    'top' => '52%',
                    'left' => '28%',
                    'requires' => ['html-fast-track', 'css-micro-interactions'],
                ],
                [
                    'slug' => 'js-logic-puzzles',
                    'title' => 'Logic Puzzle',
                    'level' => 3,
                    'xp' => 150,
                    'duration' => '10 menit',
                    'status' => 'locked',
                    'summary' => 'Latihan array & control flow via drag-drop.',
                    'top' => '35%',
                    'left' => '62%',
                    'requires' => ['treasure'],
                ],
                [
                    'slug' => 'python-data-party',
                    'title' => 'Python Boss',
                    'level' => 4,
                    'xp' => 200,
                    'duration' => '15 menit',
                    'status' => 'locked',
                    'summary' => 'Membersihkan dataset startup Surabaya pakai pandas.',
                    'top' => '18%',
                    'left' => '82%',
                    'requires' => ['js-logic-puzzles'],
                ],
            ];
        @endphp
        @include('components.page-loader')
        <div class="min-h-screen flex flex-col">
            <header class="border-b border-white/10 bg-slate-900/80 backdrop-blur">
                <div class="max-w-6xl mx-auto px-6 py-5 flex flex-wrap items-center gap-4 justify-between">
                    <div class="flex items-center gap-3">
                        <div class="h-14 w-14 rounded-2xl bg-gradient-to-br from-emerald-400 to-violet-500 flex items-center justify-center text-2xl font-bold">
                            {{ strtoupper(substr(Auth::user()->name ?? 'T', 0, 1)) }}
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-[0.5em] text-white/50">Techno Journey</p>
                            <p class="text-2xl font-semibold">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-wrap items-center gap-3 text-sm font-semibold">
                        <div class="flex items-center gap-2 bg-white/10 rounded-full px-4 py-2">
                            <span>🔥</span>
                            <span>12 Hari</span>
                        </div>
                        <div class="flex items-center gap-2 bg-white/10 rounded-full px-4 py-2">
                            <span class="animate-pulse">❤️</span>
                            <span x-text="hearts + '/' + maxHearts + ' Hearts'"></span>
                        </div>
                        <div class="flex items-center gap-2 bg-white/10 rounded-full px-4 py-2">
                            <span>🪙</span>
                            <span x-text="coins + ' Coin'"></span>
                        </div>
                        <a href="/playground" class="px-4 py-2 rounded-full border border-white/20 text-white/80 hover:text-white">Playground Web</a>
                        <form action="{{ route('auth.logout') }}" method="POST" class="m-0">
                            @csrf
                            <button class="px-4 py-2 rounded-full border border-rose-300 text-rose-200 hover:border-rose-400">Keluar</button>
                        </form>
                    </div>
                </div>
                <div class="max-w-6xl mx-auto px-6 pb-4 flex gap-3 text-sm font-semibold">
                    <template x-for="item in tabs" :key="item.id">
                        <button @click="tab = item.id" :class="tab===item.id ? 'bg-emerald-500 text-slate-900 nav-pill-active' : 'bg-white/5 text-white/70'" class="px-5 py-2 rounded-full">
                            <span x-text="item.label"></span>
                        </button>
                    </template>
                </div>
            </header>

            <main class="flex-1 px-4 py-8">
                <div class="max-w-6xl mx-auto space-y-10">
                    <section x-show="tab==='journey'" x-transition>
                        <div class="rounded-[40px] bg-gradient-to-br from-slate-900 via-slate-950 to-black border border-white/10 overflow-hidden">
                            <div class="grid lg:grid-cols-[2fr,1fr]">
                                <div>
                                    <div class="map-grid relative p-10 min-h-[580px] hidden lg:block">
                                        <svg class="absolute inset-0 w-full h-full pointer-events-none" viewBox="0 0 600 520">
                                            <defs>
                                                <linearGradient id="mapLine" x1="0%" y1="0%" x2="100%" y2="0%">
                                                    <stop offset="0%" stop-color="#5ef38c" />
                                                    <stop offset="50%" stop-color="#a855f7" />
                                                    <stop offset="100%" stop-color="#f97316" />
                                                </linearGradient>
                                            </defs>
                                            <path d="M70 480 C180 420 160 320 300 300 C420 280 420 180 520 120" stroke="url(#mapLine)" stroke-width="5" stroke-linecap="round" fill="none" />
                                            <circle cx="70" cy="480" r="12" fill="#5ef38c" />
                                            <circle cx="520" cy="120" r="12" fill="#f97316" />
                                        </svg>
                                        <template x-for="module in modules" :key="module.slug">
                                            <button
                                                class="absolute transform -translate-x-1/2 -translate-y-1/2 flex flex-col items-center gap-2 focus:outline-none transition"
                                                :style="`top: ${module.top}; left: ${module.left};`"
                                                @click="if(module.status !== 'locked') selectedQuest = module.slug"
                                                :class="{ 'opacity-40 cursor-not-allowed': module.status === 'locked', 'ring-4 ring-white/40': module.slug === selectedQuest }"
                                            >
                                                <div
                                                    class="flex items-center justify-center rounded-full text-xl md:text-2xl transition"
                                                    :class="{
                                                        'h-16 w-16 md:h-20 md:w-20 bg-emerald-500 text-slate-900 node-glow': module.status === 'done',
                                                        'h-20 w-20 md:h-24 md:w-24 bg-techno-purple text-white node-glow animate-pulse border-4 border-white/30': module.status === 'active',
                                                        'h-16 w-16 md:h-20 md:w-20 bg-amber-400 text-slate-900 node-glow border-4 border-amber-200/60': module.status === 'reward',
                                                        'h-16 w-16 md:h-20 md:w-20 bg-emerald-500 text-slate-900 node-glow border-4 border-white/40': module.status === 'claimed',
                                                        'h-16 w-16 md:h-20 md:w-20 bg-white/10 border border-white/30 text-white/50': module.status === 'locked'
                                                    }"
                                                >
                                                    <span x-text="module.status === 'reward' ? '🧰' : module.status === 'claimed' ? '✔' : 'Lvl ' + module.level"></span>
                                                </div>
                                                <p class="text-base font-semibold" x-text="module.title"></p>
                                            </button>
                                        </template>
                                    </div>
                                    <div class="lg:hidden p-6 space-y-5">
                                        <p class="text-xs uppercase tracking-[0.4em] text-white/40">Perjalanan Mobile</p>
                                        <div class="relative pl-6">
                                            <div class="absolute left-3 top-0 bottom-0 w-0.5 bg-white/10"></div>
                                            <template x-for="(module, index) in modules" :key="module.slug">
                                                <div class="flex gap-4 relative">
                                                    <div class="flex flex-col items-center">
                                                        <div
                                                            class="h-12 w-12 rounded-2xl flex items-center justify-center text-sm font-semibold"
                                                            :class="{
                                                                'bg-emerald-500/20 text-emerald-200 border border-emerald-300/40': module.status === 'done',
                                                                'bg-violet-500/30 text-white border border-white/30 animate-pulse': module.status === 'active',
                                                                'bg-amber-400 text-slate-900 border border-white/20': module.status === 'reward',
                                                                'bg-white/10 text-white/60 border border-white/20': module.status === 'locked'
                                                            }"
                                                        >
                                                            <span x-text="module.status === 'reward' ? 'Treasure' : 'Level ' + module.level"></span>
                                                        </div>
                                                        <div class="flex-1 w-px bg-white/10" x-show="index < modules.length - 1"></div>
                                                    </div>
                                                    <div class="flex-1 rounded-2xl bg-white/5 border border-white/10 p-4 mb-6">
                                                        <div class="flex items-center justify-between">
                                                            <p class="font-semibold" x-text="module.title"></p>
                                                            <span class="text-xs text-white/50" x-text="module.duration || 'Reward'"></span>
                                                        </div>
                                                        <p class="text-sm text-white/60 mt-1" x-text="module.summary"></p>
                                                        <div class="flex items-center gap-3 text-xs text-white/50 mt-3">
                                                            <span x-text="module.xp + ' XP'"></span>
                                                            <span x-text="module.status === 'reward' ? 'Hadiah siap klaim' : (module.status === 'locked' ? 'Terkunci' : 'Bisa dimainkan')"></span>
                                                        </div>
                                                        <div class="mt-4 flex gap-2">
                                                            <button
                                                                class="flex-1 px-3 py-2 rounded-2xl text-sm font-semibold"
                                                                :class="module.status === 'locked' ? 'bg-white/10 text-white/40 cursor-not-allowed' : 'bg-emerald-500 text-slate-900 shadow shadow-emerald-500/40'"
                                                                @click="
                                                                    if (module.status === 'locked') return;
                                                                    selectedQuest = module.slug;
                                                                    if (module.slug !== 'treasure') {
                                                                        window.location.href = moduleLink(module.slug);
                                                                    }
                                                                "
                                                            >
                                                                <span x-text="module.status === 'reward' ? 'Lihat Reward' : 'Mainkan Modul'"></span>
                                                            </button>
                                                            <button
                                                                class="px-3 py-2 rounded-2xl border border-white/15 text-xs text-white/70"
                                                                :class="{ 'opacity-40 cursor-not-allowed': module.status === 'locked' }"
                                                                @click="if(module.status !== 'locked'){ selectedQuest = module.slug }"
                                                            >
                                                                Detail
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="mt-6 max-w-md mx-auto" x-data="rewardedVideo($root)">
                                        <div class="rounded-3xl bg-white/10 border border-white/20 p-4 flex items-center gap-3">
                                            <div class="h-12 w-12 rounded-2xl bg-gradient-to-br from-rose-500 to-orange-500 flex items-center justify-center text-2xl">🎬</div>
                                            <div class="text-sm">
                                                <p class="font-semibold text-white">Kehabisan hearts?</p>
                                                <p class="text-white/70">Tonton video 30 detik buat +1 ❤️</p>
                                            </div>
                                            <button class="px-3 py-2 rounded-full bg-emerald-500 text-slate-900 text-xs font-semibold shadow" @click="play()">Tonton</button>
                                        </div>
                                        <div class="mt-3 space-y-3" x-show="showPlayer" x-transition>
                                            <div class="aspect-video rounded-2xl overflow-hidden border border-white/20">
                                                <iframe :src="currentSrc" title="Rewarded video" class="w-full h-full" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                            <button class="w-full px-3 py-2 rounded-full bg-emerald-500 text-slate-900 text-xs font-semibold shadow" @click="claim()">Selesai (+1 ❤️ +25🪙)</button>
                                        </div>
                                        <p class="mt-2 text-xs text-emerald-300" x-show="claimed" x-transition>Nyawa & koin bertambah! (simulasi)</p>
                                    </div>
                                </div>
                                <div class="p-8 space-y-6 bg-slate-950/60">
                                    <template x-if="modulesBySlug && modulesBySlug[selectedQuest]">
                                        <div>
                                            <p class="text-xs uppercase tracking-[0.5em] text-white/50">Quest</p>
                                            <h3 class="text-2xl font-semibold" x-text="modulesBySlug[selectedQuest].title"></h3>
                                            <p class="text-white/70 text-sm mt-2" x-text="modulesBySlug[selectedQuest].summary"></p>
                                            <div class="rounded-3xl bg-white/5 border border-white/10 p-5 space-y-3 text-sm text-white/70 mt-4">
                                                <p>🎯 Target XP: <span x-text="modulesBySlug[selectedQuest].xp || '???'"></span></p>
                                                <p>⌛ Estimasi: <span x-text="modulesBySlug[selectedQuest].duration || 'Reward'"></span></p>
                                                <p>📍 Level: <span x-text="modulesBySlug[selectedQuest].level"></span></p>
                                            </div>
                                            <div class="mt-4 flex gap-3" x-show="modulesBySlug[selectedQuest].slug !== 'treasure'">
                                                <a :href="moduleLink(modulesBySlug[selectedQuest].slug)" class="flex-1 px-4 py-3 rounded-2xl bg-gradient-to-r from-emerald-400 to-lime-400 text-slate-900 font-semibold shadow shadow-emerald-400/40 text-center">Buka Modul</a>
                                                <button class="px-4 py-3 rounded-2xl border border-white/20 text-white/70 font-semibold" @click="markCompleted(selectedQuest)" x-show="modulesBySlug[selectedQuest].status === 'active'">Tandai Selesai</button>
                                            </div>
                                            <p class="text-xs text-emerald-300 mt-2" x-show="modulesBySlug[selectedQuest].status === 'done'">Modul ini sudah kelar. Gas berikutnya!</p>
                                            <template x-if="modulesBySlug[selectedQuest].slug === 'treasure'">
                                                <div class="mt-4 space-y-2">
                                                    <button class="w-full px-4 py-3 rounded-2xl bg-amber-400 text-slate-900 font-semibold" :class="{ 'opacity-40 cursor-not-allowed': !canClaimTreasure() }" :disabled="!canClaimTreasure()" @click="claimTreasure()">Klaim Reward (❤️ + 🪙)</button>
                                                    <p class="text-xs text-white/60" x-text="canClaimTreasure() ? 'Reward siap kamu ambil!' : 'Selesaikan quest sebelumnya dulu.'"></p>
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </section>

                    <section x-show="tab==='arena'" x-transition>
                        <!-- existing arena content from previous version -->
                        @include('partials.dashboard-arena')
                    </section>

                    <section x-show="tab==='profile'" x-transition>
                        @include('partials.dashboard-profile')
                    </section>
                </div>
            </main>

            <nav class="lg:hidden fixed bottom-0 inset-x-0 bg-[#04040f]/95 border-t border-white/10">
                <div class="mx-auto max-w-[480px] flex">
                    <template x-for="item in tabs" :key="item.id">
                        <button @click="tab=item.id" class="flex-1 flex flex-col items-center justify-center py-3 text-sm" :class="tab===item.id ? 'text-emerald-400 font-semibold' : 'text-white/50'">
                            <span x-text="item.icon" class="text-xl"></span>
                            <span x-text="item.text"></span>
                        </button>
                    </template>
                </div>
            </nav>
        </div>

        <script>
            function dashboardApp() {
                return {
                    tab: '{{ request('tab', 'journey') }}',
                    tabs: [
                        { id: 'journey', label: '🚀 Perjalanan', icon: '🚀', text: 'Journey' },
                        { id: 'arena', label: '🏆 Arena', icon: '🏆', text: 'Arena' },
                        { id: 'profile', label: '👤 Profil', icon: '👤', text: 'Profil' },
                    ],
                    hearts: 4,
                    maxHearts: 5,
                    coins: 240,
                    isMobileView: false,
                    modules: @json($journeyModules),
                    modulesBySlug: {},
                    selectedQuest: null,
                    init() {
                        this.modules = this.modules.map(module => ({ ...module }));
                        this.modules.forEach(m => this.modulesBySlug[m.slug] = m);
                        this.selectedQuest = this.modules.find(m => m.status === 'active')?.slug ?? this.modules[0].slug;
                        this.updateViewport();
                        window.addEventListener('resize', () => this.updateViewport());
                    },
                    updateViewport() {
                        if (typeof window === 'undefined') return;
                        this.isMobileView = window.matchMedia('(max-width: 1023px)').matches;
                    },
                    moduleLink(slug) {
                        if (!slug) return '#';
                        const suffix = this.isMobileView ? '?context=mobile' : '';
                        return `/playground/modules/${slug}${suffix}`;
                    },
                    markCompleted(slug) {
                        const module = this.modulesBySlug[slug];
                        if (!module || module.status === 'done') return;
                        module.status = 'done';
                        this.coins += module.xp;
                        this.unlockNext(slug);
                    },
                    unlockNext(slug) {
                        const index = this.modules.findIndex(m => m.slug === slug);
                        const next = this.modules[index + 1];
                        if (next && next.status === 'locked') {
                            const ready = (next.requires || []).every(req => this.modulesBySlug[req]?.status === 'done' || this.modulesBySlug[req]?.status === 'claimed');
                            if (ready) {
                                next.status = next.slug === 'treasure' ? 'reward' : 'active';
                            }
                        }
                    },
                    canClaimTreasure() {
                        const treasure = this.modulesBySlug['treasure'];
                        if (!treasure) return false;
                        return (treasure.requires || []).every(req => this.modulesBySlug[req]?.status === 'done');
                    },
                    claimTreasure() {
                        if (!this.canClaimTreasure()) return;
                        const treasure = this.modulesBySlug['treasure'];
                        treasure.status = 'claimed';
                        this.addHeart();
                        this.addCoins(100);
                        this.unlockNext('treasure');
                    },
                    addHeart() {
                        if (this.hearts < this.maxHearts) this.hearts++;
                    },
                    addCoins(amount) {
                        this.coins += amount;
                    }
                };
            }

            function rewardedVideo(root) {
                return {
                    videos: ['dQw4w9WgXcQ', 'rUWxSEwctFU', 'lXMskKTw3Bc'],
                    showPlayer: false,
                    claimed: false,
                    currentSrc: '',
                    play() {
                        const id = this.videos[Math.floor(Math.random() * this.videos.length)];
                        this.currentSrc = `https://www.youtube.com/embed/${id}?autoplay=1&rel=0`;
                        this.showPlayer = true;
                        this.claimed = false;
                    },
                    claim() {
                        this.showPlayer = false;
                        this.claimed = true;
                        root.addHeart();
                        root.addCoins(25);
                    }
                };
            }
        </script>
    </body>
</html>
