<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Techno · {{ $module['title'] }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
        @php
            $hasViteBuild = file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot'));
        @endphp
        @if ($hasViteBuild)
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
        @endif
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>
        <style>
            body { font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
        </style>
    </head>
    @php
        $isMobileContext = ($context ?? 'web') === 'mobile';
        $backUrl = $isMobileContext ? route('dashboard') : route('playground.index');
        $backLabel = $isMobileContext ? '← Kembali ke Perjalanan' : '← Kembali';
    @endphp
    <body class="{{ $isMobileContext ? 'bg-[#020617]' : 'bg-[#05060F]' }} text-white min-h-screen">
        @include('components.page-loader')
        <header class="border-b border-white/10 bg-slate-900/80 backdrop-blur">
            <div class="{{ $isMobileContext ? 'max-w-3xl' : 'max-w-5xl' }} mx-auto px-6 py-5 flex items-center justify-between gap-4">
                <div>
                    <p class="text-xs uppercase tracking-[0.5em] text-white/50">Modul</p>
                    <h1 class="text-3xl font-semibold">{{ $module['title'] }}</h1>
                    @if ($isMobileContext)
                        <p class="text-sm text-white/60 mt-1">Mode fokus mobile · 10 kartu materi + quiz minimal 75%</p>
                    @endif
                </div>
                <a href="{{ $backUrl }}" class="px-4 py-2 rounded-full border border-white/20 text-white/80">{{ $backLabel }}</a>
            </div>
        </header>
        <main class="{{ $isMobileContext ? 'max-w-3xl' : 'max-w-5xl' }} mx-auto px-6 py-10 space-y-10">
            <section class="rounded-3xl bg-white/5 border border-white/10 overflow-hidden">
                <img src="{{ $module['thumbnail'] }}" alt="{{ $module['title'] }}" class="w-full h-72 object-cover" />
                <div class="p-8 space-y-4">
                    <div class="flex flex-wrap gap-4 text-base text-white/70">
                        <span>⭐ {{ $module['xp'] }} XP</span>
                        <span>⏱ {{ $module['duration'] }}</span>
                        <span>🎯 Level {{ $module['level'] }}</span>
                    </div>
                    <p class="text-white/80 text-lg leading-relaxed">{{ $module['summary'] }}</p>
                    <div class="flex flex-wrap gap-3 text-base text-white/60">
                        <span class="px-3 py-1 rounded-full bg-white/10">Kategori: {{ $module['category'] }}</span>
                        <a href="{{ $module['resource'] }}" class="px-3 py-1 rounded-full bg-white/10 underline" target="_blank">Resource Resmi</a>
                    </div>
                </div>
            </section>

            <section class="rounded-3xl bg-slate-950 border border-white/10 p-8 grid lg:grid-cols-2 gap-8 items-center">
                <img src="https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=800&q=80" alt="Analog HTML" class="rounded-2xl border border-white/10 w-full h-full object-cover" />
                <div class="space-y-4 text-white/80 text-lg leading-relaxed">
                    <h4 class="text-3xl font-semibold">Analogi Santai</h4>
                    <p>Bayangno HTML kayak blueprint kos-kosan. Tag pembuka = pintu gerbang, isi <code>&lt;body&gt;</code> = kamar-kamar tempat konten tinggal.</p>
                    <ul class="space-y-3 text-base text-white/70 list-disc list-inside">
                        <li><strong>&lt;header&gt;</strong>: Plang nama kos plus informasi penting.</li>
                        <li><strong>&lt;main&gt;</strong>: Area kamar, detail fasilitas, foto-foto.</li>
                        <li><strong>&lt;footer&gt;</strong>: Kontak pemilik & aturan jam malam.</li>
                    </ul>
                </div>
            </section>

            <section
                class="rounded-3xl bg-white/5 border border-white/10 p-8 space-y-4"
                x-data="{
                    words: ['<!DOCTYPE html>', '<html>', '<head>', '<title>', '</title>', '</head>', '<body>', '<h1>', '</h1>', '</body>', '</html>'],
                    selected: [],
                    answer: ['<!DOCTYPE html>', '<html>', '<head>', '<title>', '</title>', '</head>', '<body>', '<h1>', '</h1>', '</body>', '</html>'],
                    addWord(word) {
                        if (this.selected.length === this.answer.length) return;
                        const idx = this.words.indexOf(word);
                        if (idx >= 0) {
                            this.words.splice(idx, 1);
                            this.selected.push(word);
                        }
                    },
                    reset() {
                        this.words = ['<!DOCTYPE html>', '<html>', '<head>', '<title>', '</title>', '</head>', '<body>', '<h1>', '</h1>', '</body>', '</html>'];
                        this.selected = [];
                    },
                    isCorrect() {
                        return this.selected.length === this.answer.length && this.selected.every((w, i) => w === this.answer[i]);
                    }
                }"
            >
                <div class="flex items-center justify-between">
                    <p class="text-base uppercase tracking-[0.4em] text-white/50">Susun Struktur HTML</p>
                    <button class="text-sm text-emerald-400 underline" @click="reset()">Reset</button>
                </div>
                <div class="flex flex-wrap gap-3">
                    <template x-for="word in words" :key="word">
                        <button class="px-4 py-2 rounded-full bg-white/10 text-sm hover:bg-white/20" @click="addWord(word)" x-text="word"></button>
                    </template>
                </div>
                <div class="min-h-[150px] rounded-2xl bg-black/30 border border-white/10 p-5 space-y-3 text-lg">
                    <template x-for="(word, idx) in selected" :key="idx">
                        <div class="flex items-center justify-between rounded-xl bg-white/5 px-4 py-3">
                            <span x-text="word"></span>
                            <button class="text-sm text-rose-300" @click="
                                words.push(word);
                                selected.splice(idx,1);
                            ">Buang</button>
                        </div>
                    </template>
                    <p class="text-white/50 text-sm" x-show="selected.length === 0">Klik token di atas untuk menyusun kode.</p>
                </div>
                <template x-if="isCorrect()">
                    <div class="rounded-2xl bg-emerald-500/20 border border-emerald-400 text-emerald-200 text-base px-5 py-4">Mantap! Blueprint lengkap, lanjutkan belajar.</div>
                </template>
            </section>

            @if (!empty($module['game'] ?? []))
                <section
                    class="rounded-3xl bg-gradient-to-br from-violet-600/60 via-indigo-700/60 to-emerald-500/60 border border-white/10 p-8 space-y-6"
                    x-data="syntaxCatch(@js($module['game']))"
                >
                    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                        <div>
                            <p class="text-xs uppercase tracking-[0.4em] text-white/70">Mini Game</p>
                            <h3 class="text-2xl font-semibold" x-text="config.title"></h3>
                            <p class="text-sm text-white/80 mt-1" x-text="config.description"></p>
                        </div>
                        <div class="flex gap-3 text-sm font-semibold">
                            <span class="px-4 py-2 rounded-full bg-white/10 text-white/80">Target <span x-text="target"></span> syntax</span>
                            <span class="px-4 py-2 rounded-full bg-white/10 text-white/80">Nyawa <span x-text="lives"></span></span>
                        </div>
                    </div>
                    <div class="grid sm:grid-cols-3 gap-4 text-sm">
                        <div class="rounded-2xl bg-white/10 border border-white/20 px-4 py-3">
                            <p class="text-white/60 text-xs uppercase tracking-[0.3em]">Skor</p>
                            <p class="text-2xl font-semibold" x-text="score + '/' + target"></p>
                        </div>
                        <div class="rounded-2xl bg-white/10 border border-white/20 px-4 py-3">
                            <p class="text-white/60 text-xs uppercase tracking-[0.3em]">Kesalahan</p>
                            <p class="text-2xl font-semibold text-amber-200" x-text="mistakes"></p>
                        </div>
                        <div class="rounded-2xl bg-white/10 border border-white/20 px-4 py-3">
                            <p class="text-white/60 text-xs uppercase tracking-[0.3em]">Status</p>
                            <p class="text-lg font-semibold" x-text="statusLabel"></p>
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-4" x-show="status === 'playing'" x-transition>
                        <template x-for="token in currentBatch" :key="token.id">
                            <button
                                class="rounded-2xl bg-white/10 border border-white/20 px-4 py-3 text-left hover:bg-white/20 transition"
                                @click="pick(token)"
                            >
                                <p class="font-semibold" x-text="token.text"></p>
                                <p class="text-xs text-white/70 mt-1" x-text="token.hint"></p>
                            </button>
                        </template>
                    </div>
                    <div class="text-center space-y-3" x-show="status !== 'playing'" x-transition>
                        <template x-if="status === 'idle'">
                            <div>
                                <p class="text-sm text-white/70">Tangkap semua syntax yang valid. Klik mulai dan buru sebelum nyawa habis.</p>
                                <button class="mt-3 px-5 py-3 rounded-2xl bg-white text-slate-900 font-semibold" @click="start()">Mulai Game</button>
                            </div>
                        </template>
                        <template x-if="status === 'finished'">
                            <div>
                                <p class="text-emerald-200 text-lg font-semibold">Mbois! Kamu menang 🎉</p>
                                <button class="mt-3 px-5 py-3 rounded-2xl bg-white/10 border border-white/30 text-white font-semibold" @click="start()">Main Lagi</button>
                            </div>
                        </template>
                        <template x-if="status === 'failed'">
                            <div>
                                <p class="text-rose-200 text-lg font-semibold">Nyawa habis. Coba fokusin lagi.</p>
                                <button class="mt-3 px-5 py-3 rounded-2xl bg-rose-500 text-slate-900 font-semibold" @click="start()">Ulang Game</button>
                            </div>
                        </template>
                    </div>
                </section>
            @endif

            @if (!empty($module['lessons'] ?? []))
                <section
                    class="rounded-3xl bg-slate-950 border border-white/10 p-8 space-y-6 {{ $isMobileContext ? 'max-w-2xl mx-auto' : 'max-w-4xl mx-auto' }}"
                    x-data="{
                        lessons: @js($module['lessons']),
                        quiz: @js($module['quiz']),
                        nextSlug: '{{ $module['next_slug'] ?? '' }}',
                        contextSuffix: '{{ $isMobileContext ? '?context=mobile' : '' }}',
                        step: 0,
                        phase: 'lesson',
                        answers: {},
                        score: null,
                        get progress() { return Math.round(((this.step + 1) / this.lessons.length) * 100); },
                        nextStep() {
                            if (this.step < this.lessons.length - 1) {
                                this.step++;
                            } else {
                                this.phase = 'quiz';
                            }
                        },
                        prevStep() {
                            if (this.step > 0) this.step--;
                        },
                        submitQuiz() {
                            let correct = 0;
                            this.quiz.forEach((q, idx) => {
                                if (this.answers[idx] === q.answer) {
                                    correct++;
                                }
                            });
                            this.score = Math.round((correct / this.quiz.length) * 100);
                            this.phase = 'result';
                        },
                        retry() {
                            this.answers = {};
                            this.score = null;
                            this.phase = 'quiz';
                        },
                        restartModule() {
                            this.step = 0;
                            this.phase = 'lesson';
                            this.answers = {};
                            this.score = null;
                        }
                    }"
                >
                    <div x-show="phase === 'lesson'">
                        <div class="flex items-center justify-between mb-4">
                            <p class="text-base uppercase tracking-[0.4em] text-white/50">Slide <span x-text="step + 1"></span>/{{ count($module['lessons']) }}</p>
                            <span class="text-sm text-white/60">Progress <span x-text="progress"></span>%</span>
                        </div>
                        <div class="rounded-[40px] bg-white/5 border border-white/10 p-8 space-y-4 text-center">
                            <h4 class="text-3xl font-semibold text-white" x-text="lessons[step].title"></h4>
                            <p class="text-white/80 text-lg leading-relaxed max-w-3xl mx-auto" x-text="lessons[step].content"></p>
                        </div>
                        <div class="flex items-center justify-between mt-6">
                            <button class="px-5 py-3 rounded-full border border-white/20 text-white/80 text-sm" @click="prevStep()" :disabled="step === 0">Kembali</button>
                            <button class="px-5 py-3 rounded-full bg-emerald-500 text-slate-900 font-semibold text-sm" @click="nextStep()" x-text="step === lessons.length - 1 ? 'Mulai Quiz' : 'Next Slide'"></button>
                        </div>
                    </div>

                    <div x-show="phase === 'quiz'" x-transition>
                        <p class="text-base uppercase tracking-[0.4em] text-white/50 text-center">Quiz 5 Soal • Minimal 75%</p>
                        <form class="space-y-5 mt-6" @submit.prevent="submitQuiz()">
                            <template x-for="(question, idx) in quiz" :key="idx">
                                <div class="rounded-3xl bg-white/5 border border-white/10 p-5 space-y-3">
                                    <p class="text-base font-semibold" x-text="(idx + 1)+'. '+question.question"></p>
                                    <template x-for="option in question.options" :key="option">
                                        <label class="flex items-center gap-2 text-base text-white/70">
                                            <input type="radio" class="text-emerald-500 focus:ring-emerald-500" :name="'question-'+idx" :value="option" x-model="answers[idx]" required />
                                            <span x-text="option"></span>
                                        </label>
                                    </template>
                                </div>
                            </template>
                            <button class="w-full px-5 py-3 rounded-2xl bg-gradient-to-r from-emerald-400 to-lime-400 text-slate-900 font-semibold">Kumpulin Jawaban</button>
                        </form>
                        <p class="text-sm text-white/60 mt-3 text-center">Level berikutnya akan kebuka otomatis kalau skor ≥ 75%.</p>
                    </div>

                    <div x-show="phase === 'result'" x-transition>
                        <div class="rounded-3xl bg-white/5 border border-white/10 p-8 text-center space-y-3">
                            <p class="text-base uppercase tracking-[0.4em] text-white/50">Hasil Quiz</p>
                            <p class="text-4xl lg:text-6xl font-bold" x-text="score + '%'"></p>
                            <template x-if="score >= 75">
                                <p class="text-emerald-300">Mbois! Kamu lulus dan bisa lanjut ke level berikutnya.</p>
                            </template>
                            <template x-if="score < 75">
                                <p class="text-rose-300">Belum nyentuh 75%. Review materi 10 kartu tadi lalu ulangi quiz ya.</p>
                            </template>
                        </div>
                        <div class="mt-4 flex flex-col gap-3">
                            <button class="w-full px-5 py-3 rounded-2xl border border-white/20 text-white/80 font-semibold" @click="retry()">Ulangi Quiz</button>
                            <template x-if="score < 75">
                                <button class="w-full px-5 py-3 rounded-2xl border border-rose-300 text-rose-200 font-semibold" @click="restartModule()">Ulangi Materi</button>
                            </template>
                            <template x-if="score < 75">
                                <p class="text-xs text-white/60 text-center">Pilih "Ulangi Materi" buat balik ke modul awal sebelum coba quiz lagi.</p>
                            </template>
                            <template x-if="score >= 75 && nextSlug">
                                <a :href="'/playground/modules/' + nextSlug + contextSuffix" class="w-full px-5 py-3 rounded-2xl bg-emerald-500 text-slate-900 font-semibold text-center">Gas Level Selanjutnya</a>
                            </template>
                        </div>
                    </div>
                </section>
            @else
                <section class="rounded-3xl bg-slate-950 border border-white/10 p-8" x-data="{ playing: false }">
                    <div class="flex items-center justify-between">
                        <p class="text-base uppercase tracking-[0.4em] text-white/50">Interactive Player</p>
                        <button class="px-5 py-3 rounded-full bg-emerald-500 text-slate-900 font-semibold" @click="playing = !playing" x-text="playing ? 'Pause' : 'Play Modul'"></button>
                    </div>
                    <div class="mt-4" x-show="!playing">
                        <p class="text-white/70 text-base">Klik Play untuk memulai sesi 10 menit dengan timer & mini compiler.</p>
                    </div>
                    <div class="mt-4 space-y-3" x-show="playing" x-transition>
                        <div class="flex items-center gap-3 text-base">
                            <span class="px-3 py-1 rounded-full bg-emerald-500/20 text-emerald-300">Timer 09:58</span>
                            <span class="px-3 py-1 rounded-full bg-white/10">Combo x2</span>
                        </div>
                        <pre class="bg-black/40 rounded-2xl p-4 text-base overflow-auto">{{ $module['preview'] }}</pre>
                        <button class="w-full px-5 py-3 rounded-2xl bg-gradient-to-r from-emerald-400 to-lime-400 text-slate-900 font-semibold">Submit Jawaban</button>
                    </div>
                </section>
            @endif

            <section class="grid lg:grid-cols-2 gap-6">
                <div class="rounded-3xl bg-white/5 border border-white/10 p-6">
                    <p class="text-xs uppercase tracking-[0.5em] text-white/50">Checklist Misi</p>
                    <ul class="mt-4 space-y-3 text-base text-white/80">
                        <li>✔ Baca ringkasan materi</li>
                        <li>✔ Tonton demo singkat</li>
                        <li>⬜ Kerjakan quiz drag & drop</li>
                        <li>⬜ Kirim kode akhir</li>
                    </ul>
                </div>
                <div class="rounded-3xl bg-gradient-to-br from-violet-500 to-indigo-600 p-6">
                    <p class="text-xs uppercase tracking-[0.5em] text-white/80">Need Inspiration?</p>
                    <p class="text-lg font-semibold mt-2">Cek leaderboard kampus buat lihat temenmu udah sampai mana.</p>
                    <a href="/playground#arena" class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-slate-900 bg-white rounded-full px-4 py-2">Buka Arena →</a>
                </div>
            </section>
        </main>
        <script>
            function syntaxCatch(gameConfig) {
                return {
                    config: gameConfig,
                    target: gameConfig.target ?? 5,
                    pool: gameConfig.tokens ?? [],
                    currentBatch: [],
                    score: 0,
                    mistakes: 0,
                    lives: 3,
                    status: 'idle',
                    get statusLabel() {
                        if (this.status === 'idle') return 'Siap';
                        if (this.status === 'playing') return 'Main';
                        if (this.status === 'finished') return 'Selesai';
                        if (this.status === 'failed') return 'Gagal';
                        return this.status;
                    },
                    start() {
                        if (! this.pool.length) return;
                        this.score = 0;
                        this.mistakes = 0;
                        this.lives = 3;
                        this.status = 'playing';
                        this.nextRound();
                    },
                    nextRound() {
                        if (! this.pool.length) return;
                        const shuffled = this.shuffle([...this.pool]);
                        this.currentBatch = shuffled.slice(0, 4).map((token, index) => ({
                            ...token,
                            id: `${Date.now()}-${index}-${Math.random()}`,
                        }));
                    },
                    pick(token) {
                        if (this.status !== 'playing') return;
                        if (token.correct) {
                            this.score++;
                            if (this.score >= this.target) {
                                this.status = 'finished';
                            }
                        } else {
                            this.mistakes++;
                            this.lives--;
                            if (this.lives <= 0) {
                                this.status = 'failed';
                            }
                        }
                        this.currentBatch = this.currentBatch.filter((item) => item.id !== token.id);
                        if (this.status === 'playing' && this.currentBatch.length === 0) {
                            this.nextRound();
                        }
                    },
                    shuffle(array) {
                        for (let i = array.length - 1; i > 0; i--) {
                            const j = Math.floor(Math.random() * (i + 1));
                            [array[i], array[j]] = [array[j], array[i]];
                        }
                        return array;
                    },
                };
            }
        </script>
    </body>
</html>
