<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PlaygroundController extends Controller
{
    private function modules(): array
    {
        return [
            [
                'slug' => 'html-fast-track',
                'title' => 'HTML Fast Track',
                'category' => 'HTML',
                'xp' => 120,
                'duration' => '8 menit',
                'level' => 'Pemula',
                'summary' => 'Belajar struktur tag, semantic layout, dan aksesibilitas ala MDN.',
                'thumbnail' => 'https://images.unsplash.com/photo-1523475472560-d2df97ec485c?auto=format&fit=crop&w=600&q=80',
                'resource' => 'https://developer.mozilla.org/en-US/docs/Learn/HTML',
                'preview' => "<section>\n  <h2>Judul</h2>\n  <p>Isi konten santuy.</p>\n</section>",
                'next_slug' => 'css-micro-interactions',
                'lessons' => [
                    ['title' => 'Apa Itu HTML?', 'content' => 'HTML ibarat blueprint kos-kosan digital. Tanpa ini, browser nggak tau harus nampilin apa.'],
                    ['title' => 'Tag Pembuka & Penutup', 'content' => 'Seperti buka dan tutup warung, setiap tag punya pasangan <tag> dan </tag>.'],
                    ['title' => 'Struktur Dasar Dokumen', 'content' => 'Gunakan <!DOCTYPE html>, <html>, <head>, dan <body> agar browser paham.'],
                    ['title' => 'Heading & Paragraf', 'content' => 'Heading = judul modul, paragraf = isi curhatanmu. Pakai <h1>-<h6> dan <p>.'],
                    ['title' => 'Hyperlink', 'content' => '<a href=\"\"> bantu kamu lompat antar halaman seperti teleport antar kelas.'],
                    ['title' => 'Gambar', 'content' => '<img> buat nampilin foto tugas atau meme, jangan lupa atribut alt untuk aksesibilitas.'],
                    ['title' => 'List', 'content' => 'Gunakan <ul> / <ol> untuk daftar belanja atau langkah-langkah praktikum.'],
                    ['title' => 'Semantic Tag', 'content' => '<header>, <main>, <footer> bikin struktur lebih jelas untuk SEO dan screen reader.'],
                    ['title' => 'Form', 'content' => 'Form di HTML = formulir absen, bisa isi input, select, button.'],
                    ['title' => 'Best Practice', 'content' => 'Rapiin indentasi, selalu tutup tag, gunakan komentar <!-- --> buat catatan tim.'],
                ],
                'quiz' => [
                    [
                        'question' => 'Tag apa yang membungkus seluruh konten yang terlihat?',
                        'options' => ['<head>', '<body>', '<footer>', '<main>'],
                        'answer' => '<body>',
                    ],
                    [
                        'question' => 'Elemen mana yang sebaiknya dipakai untuk navigasi utama?',
                        'options' => ['<section>', '<nav>', '<article>', '<aside>'],
                        'answer' => '<nav>',
                    ],
                    [
                        'question' => 'Atribut apa pada <img> untuk teks alternatif?',
                        'options' => ['title', 'alt', 'desc', 'label'],
                        'answer' => 'alt',
                    ],
                    [
                        'question' => 'Struktur heading yang benar?',
                        'options' => ['H1 lalu H3', 'H3 lalu H1', 'Bebas aja', 'H1 untuk subjudul'],
                        'answer' => 'H1 lalu H3',
                    ],
                    [
                        'question' => 'Untuk membuat link eksternal kita memakai atribut?',
                        'options' => ['src', 'href', 'link', 'rel'],
                        'answer' => 'href',
                    ],
                ],
                'game' => [
                    'title' => 'HTML Syntax Catch',
                    'description' => 'Tap tag yang valid buat jaga struktur layout-mu.',
                    'target' => 6,
                    'tokens' => [
                        ['text' => '<section>', 'correct' => true, 'hint' => 'Tag semantic'],
                        ['text' => '<div class="hero">', 'correct' => true, 'hint' => 'Div dengan atribut valid'],
                        ['text' => '<blink>', 'correct' => false, 'hint' => 'Sudah deprecated'],
                        ['text' => '<main>', 'correct' => true, 'hint' => 'Menandai konten utama'],
                        ['text' => '<img src="x" alt="y">', 'correct' => true, 'hint' => 'Butuh alt'],
                        ['text' => '<section></div>', 'correct' => false, 'hint' => 'Penutup nggak matching'],
                        ['text' => '<footer>', 'correct' => true, 'hint' => 'Bagian akhir halaman'],
                        ['text' => '<div>>', 'correct' => false, 'hint' => 'Sintaks salah'],
                    ],
                ],
            ],
            [
                'slug' => 'css-micro-interactions',
                'title' => 'CSS Micro Interactions',
                'category' => 'CSS',
                'xp' => 140,
                'duration' => '10 menit',
                'level' => 'Menengah',
                'summary' => 'Gunakan Tailwind dan keyframes buat animasi halus di UI mobile.',
                'thumbnail' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=600&q=80',
                'resource' => 'https://web.dev/animations-guide/',
                'preview' => '@keyframes pulse {0%{transform:scale(1);}70%{transform:scale(1.08);}100%{transform:scale(1);}}',
                'game' => [
                    'title' => 'CSS Property Rush',
                    'description' => 'Pilih deklarasi CSS yang valid supaya animasi gak error.',
                    'target' => 6,
                    'tokens' => [
                        ['text' => 'display: flex;', 'correct' => true, 'hint' => 'Properti standar'],
                        ['text' => 'color = #fff;', 'correct' => false, 'hint' => 'Gunakan titik dua'],
                        ['text' => 'animation-duration: 500ms;', 'correct' => true, 'hint' => 'Properti animasi'],
                        ['text' => 'border-radius 12px;', 'correct' => false, 'hint' => 'Kurang titik dua'],
                        ['text' => 'transform: scale(1.1);', 'correct' => true, 'hint' => 'Digunakan buat micro interaction'],
                        ['text' => 'font-weight: 600;', 'correct' => true, 'hint' => 'Valid'],
                        ['text' => 'padding-top: 1rem;', 'correct' => true, 'hint' => 'Valid'],
                        ['text' => 'background-color: rgba(0,0,0);', 'correct' => false, 'hint' => 'Kurang nilai alpha'],
                    ],
                ],
            ],
            [
                'slug' => 'js-logic-puzzles',
                'title' => 'JS Logic Puzzles',
                'category' => 'JavaScript',
                'xp' => 160,
                'duration' => '12 menit',
                'level' => 'Menengah',
                'summary' => 'Pecahkan puzzle drag-and-drop untuk memahami kontrol alur & array.',
                'thumbnail' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80',
                'resource' => 'https://javascript.info/first-steps',
                'preview' => "const streak = [1,2,3,4,5];\nconst total = streak.reduce((sum, day)=>sum+day,0);",
                'game' => [
                    'title' => 'JavaScript Snatch',
                    'description' => 'Tangkap snippet JS yang valid, hindari bug sintaks!',
                    'target' => 7,
                    'tokens' => [
                        ['text' => 'const total = arr.reduce((sum, n) => sum + n, 0);', 'correct' => true, 'hint' => 'Arrow function valid'],
                        ['text' => 'let streak == 0;', 'correct' => false, 'hint' => 'Assignment harus pakai ='],
                        ['text' => 'if (xp > 100) { level++; }', 'correct' => true, 'hint' => 'Blok if normal'],
                        ['text' => 'function () => {}', 'correct' => false, 'hint' => 'Sintaks campuran'],
                        ['text' => 'const user = { name: "Alya" };', 'correct' => true, 'hint' => 'Object literal'],
                        ['text' => 'for (let i of 10) {}', 'correct' => false, 'hint' => 'for...of butuh iterable'],
                        ['text' => 'const score = Number(input);', 'correct' => true, 'hint' => 'Konversi eksplisit'],
                        ['text' => 'array.map(value => return value * 2);', 'correct' => false, 'hint' => 'Arrow function tidak pakai return begitu'],
                    ],
                ],
            ],
            [
                'slug' => 'python-data-party',
                'title' => 'Python Data Party',
                'category' => 'Python',
                'xp' => 200,
                'duration' => '15 menit',
                'level' => 'Advance',
                'summary' => 'Gunakan pandas buat bersihin dataset startup Surabaya.',
                'thumbnail' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=600&q=80',
                'resource' => 'https://pandas.pydata.org/docs/getting_started/index.html',
                'preview' => "import pandas as pd\ndf = pd.read_csv('startup.csv')\nprint(df.head())",
                'game' => [
                    'title' => 'Python Bug Swat',
                    'description' => 'Hantam baris Python yang sintaksnya bener supaya data nggak error.',
                    'target' => 6,
                    'tokens' => [
                        ['text' => 'for row in df:', 'correct' => true, 'hint' => 'Loop valid'],
                        ['text' => 'if xp => 100:', 'correct' => false, 'hint' => 'Operator salah'],
                        ['text' => "score = sum(points)", 'correct' => true, 'hint' => 'Builtin sum'],
                        ['text' => "print 'Hello'", 'correct' => false, 'hint' => 'Python 3 butuh parentheses'],
                        ['text' => "user = {'name': 'Salsa'}", 'correct' => true, 'hint' => 'Dict literal'],
                        ['text' => 'def add(a,b): return a + b', 'correct' => true, 'hint' => 'Function valid'],
                        ['text' => 'while True print("loop")', 'correct' => false, 'hint' => 'Kurang titik dua'],
                        ['text' => 'df["city"].unique()', 'correct' => true, 'hint' => 'Method pandas'],
                    ],
                ],
            ],
            [
                'slug' => 'reactive-alpine-ui',
                'title' => 'Reactive Alpine UI',
                'category' => 'JavaScript',
                'xp' => 150,
                'duration' => '9 menit',
                'level' => 'Menengah',
                'summary' => 'Bangun tab interaktif dengan Alpine.js buat scoreboard kampus.',
                'thumbnail' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&w=600&q=80',
                'resource' => 'https://alpinejs.dev/',
                'preview' => "<div x-data=\"{tab:'global'}\">...</div>",
                'game' => [
                    'title' => 'Reactive Sprint',
                    'description' => 'Bedakan directive Alpine/Tailwind yang valid biar komponenmu nggak error.',
                    'target' => 6,
                    'tokens' => [
                        ['text' => 'x-data="{ open: false }"', 'correct' => true, 'hint' => 'Directive utama'],
                        ['text' => 'x-show="tab === \'global\'"', 'correct' => true, 'hint' => 'Directive valid'],
                        ['text' => 'x-if="ready"', 'correct' => false, 'hint' => 'Harus pakai template'],
                        ['text' => 'x-on:click="open = !open"', 'correct' => true, 'hint' => 'Event binding'],
                        ['text' => 'x-bind:class="isActive ? \'text-white\' : \'text-slate-500\'"', 'correct' => true, 'hint' => 'Binding kelas'],
                        ['text' => ':href="route(\'dashboard\')"', 'correct' => true, 'hint' => 'Shorthand binding'],
                        ['text' => 'x-transition:duration.300', 'correct' => true, 'hint' => 'Animasi'],
                        ['text' => 'wire:click="save"', 'correct' => false, 'hint' => 'Itu punyanya Livewire'],
                    ],
                ],
            ],
        ];
    }

    public function index(Request $request): View
    {
        $modules = $this->modules();
        $categories = collect($modules)->pluck('category')->unique()->values();

        return view('playground.index', [
            'modules' => $modules,
            'categories' => $categories,
        ]);
    }

    public function show(Request $request, string $slug): View
    {
        $module = collect($this->modules())->firstWhere('slug', $slug);

        if (! $module) {
            throw new NotFoundHttpException();
        }

        if (empty($module['lessons'] ?? []) && ! empty($module['summary'])) {
            $module['lessons'] = collect(range(1, 10))->map(function ($step) use ($module) {
                return [
                    'title' => sprintf('%s · Step %d', $module['title'], $step),
                    'content' => sprintf(
                        'Checkpoint %d buat dalemin %s. Bayangno praktik nyata: %s.',
                        $step,
                        $module['category'],
                        $module['summary']
                    ),
                ];
            })->toArray();
        }

        if (empty($module['quiz'] ?? [])) {
            $module['quiz'] = [
                [
                    'question' => 'Apa tujuan utama modul ini?',
                    'options' => ['Nambah XP', 'Belajar konsep baru', 'Buat gaya-gayaan', 'Ngabisin hearts'],
                    'answer' => 'Belajar konsep baru',
                ],
                [
                    'question' => 'Berapa minimal skor buat lulus?',
                    'options' => ['50%', '60%', '75%', '100%'],
                    'answer' => '75%',
                ],
                [
                    'question' => 'Kapan waktu terbaik buat practice?',
                    'options' => ['Setelah materi', 'Sebelum materi', 'Lagi tidur', 'Pas AFK'],
                    'answer' => 'Setelah materi',
                ],
                [
                    'question' => 'Apa yang harus dilakukan kalau gagal?',
                    'options' => ['Menyerah', 'Ulangi modul', 'Bikin akun baru', 'Hapus aplikasi'],
                    'answer' => 'Ulangi modul',
                ],
                [
                    'question' => 'XP didapat dari?',
                    'options' => ['Selesai modul', 'Lihat leaderboard', 'Chat temen', 'Scroll aja'],
                    'answer' => 'Selesai modul',
                ],
            ];
        }

        if (empty($module['game'] ?? [])) {
            $module['game'] = $this->fallbackGame($module['category'] ?? 'General');
        }

        return view('playground.show', [
            'module' => $module,
            'context' => $request->query('context', 'web'),
        ]);
    }

    private function fallbackGame(string $category): array
    {
        $genericTokens = [
            ['text' => 'let xp = 120;', 'correct' => true, 'hint' => 'Deklarasi variabel'],
            ['text' => 'if hearts => 0', 'correct' => false, 'hint' => 'Operator salah'],
            ['text' => '<button>', 'correct' => true, 'hint' => 'HTML valid'],
            ['text' => 'color = #fff;', 'correct' => false, 'hint' => 'CSS salah'],
            ['text' => 'print("Hello")', 'correct' => true, 'hint' => 'Python valid'],
            ['text' => 'const () =>', 'correct' => false, 'hint' => 'Snippet nggak lengkap'],
        ];

        return [
            'title' => 'Syntax Sprint',
            'description' => sprintf('Pilih sintaks yang valid untuk kategori %s.', $category),
            'target' => 5,
            'tokens' => $genericTokens,
        ];
    }
}
