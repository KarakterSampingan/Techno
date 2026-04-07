# Skema Database Techno (Gamified Coding Platform)

Platform ini didesain buat anak kampus Surabaya yang suka belajar kilat ala Duolingo. Skema di bawah memecah kebutuhan ke beberapa domain supaya gampang ditranslasikan ke migration Laravel/Livewire nantinya.

## Ringkasan Domain

- **User & Profil:** Mahasiswa, perusahaan/sponsor, kampus, portofolio mini, skill tag.
- **Learning Engine:** Track → Modul → Lesson bite-sized + blok konten dan task interaktif (fill-in-the-blank, drag-n-drop, mini compiler).
- **Gamifikasi & Progress:** XP, level, streak, hearts, badges, log harian.
- **Social & Leaderboard:** Teman, leaderboard global/internal/antar kampus.
- **Monetisasi & Talent Pool:** Subscription, rewarded ads, dashboard perusahaan untuk shortlist talenta.

## Konvensi Notasi

- `PK` = Primary Key, `FK` = Foreign Key, `NN` = Not Null.
- `enum` cukup di-handle pakai kolom `string` + Laravel Enum/Constants.
- Timestamp standar Laravel (`created_at`, `updated_at`) diasumsikan ada kecuali disebutkan.

---

## 1. User & Profil

### `users`
**Tujuan:** Basis autentikasi untuk mahasiswa, perusahaan, dan admin.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | Auto increment. |
| `uuid` | uuid | Public ID buat share leaderboard/profile. |
| `role` | enum(`student`,`company`,`admin`) | Nentuin akses fitur. |
| `campus_id` (FK) | bigInt nullable | Kampus asal mahasiswa (null untuk perusahaan). |
| `username` | string NN unique | Dipakai di leaderboard & add friend. |
| `full_name` | string NN | Nama tampilan. |
| `email` | string NN unique | Login. |
| `avatar_url` | string nullable | Path avatar/impor CDN. |
| `current_level` | unsignedSmallInt default 1 | Level aktif. |
| `xp_total` | unsignedBigInt default 0 | Akumulasi XP. |
| `hearts` | tinyInt default 5 | Hearts tersisa. |
| `hearts_refill_at` | datetime nullable | Jadwal refill otomatis. |
| `streak_count` | unsignedSmallInt default 0 | Streak hari ini. |
| `streak_frozen_until` | datetime nullable | Efek streak freeze dari Premium. |
| `last_active_at` | datetime nullable | Buat segmentasi retention. |

Relasi utama:
- `users.id = student_profiles.user_id`, `company_profiles.user_id`, `portfolio_projects.student_id`, dsb.
- `users.campus_id` → `campuses.id` (opsional, tapi wajib buat leaderboard kampus).

### `campuses`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt |  |
| `name` | string NN | Nama kampus/politeknik. |
| `slug` | string NN unique | Dipakai di URL/leaderboard filter. |
| `city` | string | Default: Surabaya. |
| `type` | enum(`public`,`private`,`bootcamp`) | Segmentasi B2B. |
| `logo_url` | string nullable | Logo untuk leaderboard antar kampus. |

### `student_profiles`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt |  |
| `user_id` (FK) | bigInt NN unique | Relasi 1:1 dengan `users`. |
| `campus_id` (FK) | bigInt NN | Perkuat filter internal kampus. |
| `major` | string | Prodi/Jurusan. |
| `enrollment_year` | year | Angkatan. |
| `bio` | text | Perkenalan santai. |
| `portfolio_url` | string nullable | Link eksternal. |
| `availability_status` | enum(`open_intern`,`open_remote`,`not_available`) | Dibaca perusahaan. |
| `interests` | json | Minat (frontend, AI, dsb). |

### `company_profiles`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt |  |
| `user_id` (FK) | bigInt NN unique | Relasi 1:1 dengan `users`. |
| `company_name` | string NN | Nama legal brand. |
| `industry` | string | Kategori (tech, agency, edtech). |
| `company_size` | enum(`startup`,`sme`,`enterprise`) | Buat pricing B2B. |
| `contact_person` | string | PIC rekrutmen. |
| `contact_email` | string | Email HR. |
| `website` | string nullable |  |
| `preferred_skills` | json | Keyword pencarian talenta. |

### `skills`
Daftar skill utama (HTML, CSS, Python, dsb) untuk tagging otomatis dari XP/lesson.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt |  |
| `slug` | string unique |  |
| `name` | string NN |  |
| `category` | string nullable | Frontend/Backend/Data. |

### `student_skill` (pivot)
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `student_id` (FK) | bigInt NN | Mengarah ke `users.id` (role student). |
| `skill_id` (FK) | bigInt NN |  |
| `xp_source` | enum(`auto`,`manual`,`company_note`) | Source skill tag. |
| `confidence` | tinyInt default 50 | Persentase confidence. |

### `portfolio_projects`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt |  |
| `student_id` (FK) | bigInt NN |  |
| `title` | string NN | Nama proyek. |
| `summary` | text | Deskripsi singkat. |
| `tech_stack` | json | List stack utama. |
| `demo_url` | string nullable |  |
| `repo_url` | string nullable |  |
| `is_featured` | boolean default false | Dipin di profil. |

---

## 2. Learning Engine

### `learning_tracks`
Level tertinggi (HTML Dasar, CSS Advance, Python Logic).

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt |  |
| `slug` | string unique | |
| `title` | string NN | |
| `description` | text | Narasi gaya casual Surabaya. |
| `difficulty` | enum(`starter`,`mid`,`advance`) |  |
| `icon` | string | Emoji/ikon Tailwind. |
| `order` | tinyInt | Urutan tampilan. |
| `is_published` | boolean | Toggle rilis. |

### `modules`
Turunan dari track, cocok untuk sesi 5-10 menit.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `track_id` (FK) | bigInt NN | Ke `learning_tracks`. |
| `title` | string NN | |
| `description` | text | |
| `order` | tinyInt | |
| `estimated_minutes` | tinyInt | Durasi target. |
| `unlock_requirement` | json | Contoh: minimal XP atau modul prerequisite. |

### `lessons`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `module_id` (FK) | bigInt NN | |
| `title` | string NN | |
| `story_context` | text | Narasi/joke Surabaya. |
| `lesson_type` | enum(`concept`,`practice`,`challenge`) | |
| `order` | tinyInt | |
| `xp_reward` | smallInt | XP default. |
| `heart_cost` | tinyInt default 1 | Hearts hilang saat gagal. |
| `is_compiler_enabled` | boolean | Aktifkan mini compiler. |

### `lesson_blocks`
Ngatur potongan konten dalam satu lesson (text, kode, media).

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `lesson_id` (FK) | bigInt NN | |
| `block_type` | enum(`text`,`code`,`image`,`tip`) | |
| `content` | longText | Markdown/JSON. |
| `media_url` | string nullable | |
| `order` | tinyInt | |

### `interactive_tasks`
Satu lesson bisa punya beberapa task (fill-in-the-blank, drag & drop, kode).

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `lesson_id` (FK) | bigInt NN | |
| `task_type` | enum(`fill_blank`,`drag_drop`,`multiple_choice`,`code_runner`) | |
| `prompt` | text | |
| `starter_code` | longText nullable | Untuk compiler ringan. |
| `answer_schema` | json | Format jawaban benar. |
| `xp_reward` | smallInt | Override XP. |
| `max_attempts` | tinyInt default 3 | Sinkron dengan hearts. |
| `feedback_hint` | text nullable | Tips lucu/Surabaya style. |

### `task_options`
Digunakan oleh task multiple choice / drag drop.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `task_id` (FK) | bigInt NN | |
| `label` | string | Teks opsi. |
| `value` | string | Nilai jawaban. |
| `is_correct` | boolean | Flag kebenaran. |
| `order` | tinyInt | |

### `user_module_progress`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `module_id` (FK) | bigInt NN | |
| `status` | enum(`locked`,`unlocked`,`completed`) | |
| `xp_earned` | unsignedInt default 0 | |
| `last_opened_at` | datetime | |
| `completed_at` | datetime nullable | |

### `user_lesson_progress`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `lesson_id` (FK) | bigInt NN | |
| `status` | enum(`not_started`,`in_progress`,`completed`) | |
| `best_score` | tinyInt default 0 | Persen benar. |
| `xp_earned` | unsignedInt default 0 | |
| `hearts_spent` | tinyInt default 0 | |
| `completed_at` | datetime nullable | |

### `user_task_attempts`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `task_id` (FK) | bigInt NN | |
| `attempt_no` | tinyInt | |
| `is_correct` | boolean | |
| `answer_payload` | json | Jawaban user. |
| `xp_awarded` | smallInt | |
| `hearts_delta` | tinyInt | Negatif saat salah. |
| `evaluated_at` | datetime | |

### `code_playground_runs`
Log compiler ringan (HTML/CSS/JS/Python) untuk analitik.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `lesson_id` (FK) | bigInt nullable | |
| `language` | enum(`html`,`css`,`js`,`python`) | |
| `source_code` | longText | |
| `stdout` | longText nullable | |
| `stderr` | longText nullable | |
| `runtime_ms` | int | |
| `ran_at` | datetime | |

---

## 3. Gamifikasi & Progress

### `levels`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `level_number` | tinyInt unique | |
| `xp_min` | unsignedInt | |
| `xp_max` | unsignedInt | |
| `reward_description` | string | Contoh: unlock badge/hearts. |

### `xp_transactions`
Ledger XP supaya gampang rollback/analitik.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `source_type` | enum(`lesson`,`streak_bonus`,`ad_reward`,`admin_grant`) | |
| `source_id` | bigInt nullable | ID lesson/ad log dsb. |
| `amount` | int | Bisa negatif. |
| `balance_after` | unsignedBigInt | Sinkron `users.xp_total`. |
| `meta` | json | Catatan lucu, versi konten. |

### `user_daily_stats`
Buat daily streak (ikon api) dan insight retention.

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `stat_date` | date NN | |
| `lessons_finished` | tinyInt default 0 | |
| `xp_earned` | unsignedInt default 0 | |
| `streak_after` | smallInt | Nilai streak hari itu. |
| `hearts_spent` | tinyInt default 0 | |
| `hearts_refilled` | tinyInt default 0 | |

### `heart_ledgers`
Catat setiap kehilangan/penambahan heart (max 5).

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `change` | tinyInt | -1 saat salah, +1 saat reward. |
| `reason` | enum(`task_fail`,`ad_reward`,`auto_refill`,`purchase`,`admin_grant`) | |
| `balance_after` | tinyInt | Validasi max heart. |
| `trigger_reference` | bigInt nullable | ID attempt/ad/subscription. |

### `badges`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `code` | string unique | Contoh: `SI_PALING_NGOTEK`. |
| `name` | string | Nama badge. |
| `description` | string | |
| `icon` | string | Path ikon. |
| `criteria_json` | json | Rule awarding. |

### `user_badges`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `badge_id` (FK) | bigInt NN | |
| `awarded_at` | datetime | |
| `evidence` | json nullable | Simpan bukti (XP, modul). |

---

## 4. Social & Leaderboard

### `friendships`
| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `requester_id` (FK) | bigInt NN | User pengirim. |
| `addressee_id` (FK) | bigInt NN | User penerima. |
| `status` | enum(`pending`,`accepted`,`declined`,`blocked`) | |
| `accepted_at` | datetime nullable | |

### `leaderboards`
Satu baris = snapshot leaderboard (mingguan atau real-time cache).

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `scope_type` | enum(`global`,`campus`,`intercampus`,`friends`) | |
| `scope_reference_id` | bigInt nullable | Contoh: `campus_id` untuk scope campus. |
| `season_label` | string | Misal "Week-2026-14". |
| `started_at` | datetime | |
| `ended_at` | datetime | |
| `generated_at` | datetime | |

### `leaderboard_entries`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `leaderboard_id` (FK) | bigInt NN | |
| `user_id` (FK) | bigInt NN | |
| `campus_id` (FK) | bigInt nullable | Duplicate untuk query cepat. |
| `rank` | unsignedInt | |
| `xp_total` | unsignedBigInt | XP selama season. |
| `lessons_completed` | unsignedInt | KPI lain (tie-breaker). |

Relasi:
- Leaderboard Global: `scope_type = global`, `scope_reference_id = null`.
- Internal Kampus: `scope_type = campus`, `scope_reference_id = campuses.id`.
- Antar Kampus: simpan aggregate per kampus di leaderboard lain atau gunakan `leaderboard_entries` dengan `user_id = null` + `campus_id` + total XP.

---

## 5. Monetisasi & Talent Pool

### `subscription_plans`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `code` | string unique | Contoh: `TECHNO_PREMIUM`. |
| `name` | string | |
| `price_monthly` | decimal(10,2) | |
| `currency` | string default `IDR` | |
| `features` | json | Unlimited hearts, bebas iklan, streak freeze. |
| `is_active` | boolean | |

### `subscriptions`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `plan_id` (FK) | bigInt NN | |
| `status` | enum(`trial`,`active`,`grace`,`expired`,`canceled`) | |
| `started_at` | datetime | |
| `ends_at` | datetime | |
| `auto_renew` | boolean | |
| `origin` | enum(`b2c`,`campus_bundle`,`sponsor_grant`) | Tracking B2B freebies. |

### `payment_transactions`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `subscription_id` (FK) | bigInt nullable | |
| `amount` | decimal(12,2) | |
| `currency` | string | |
| `payment_method` | enum(`midtrans`,`gopay`,`credit_card`,`manual`) | |
| `provider_reference` | string | External payment ID. |
| `status` | enum(`pending`,`paid`,`failed`,`refunded`) | |
| `metadata` | json | Snap token, invoice, dsb. |
| `paid_at` | datetime nullable | |

### `rewarded_ad_partners`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `name` | string | |
| `placement_code` | string | Kode slot iklan. |
| `reward_type` | enum(`heart`,`xp`) | Default reward. |
| `reward_value` | tinyInt | Jumlah heart/XP. |
| `cooldown_seconds` | int | Interval watch. |

### `rewarded_ad_logs`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `user_id` (FK) | bigInt NN | |
| `partner_id` (FK) | bigInt NN | |
| `reward_type` | enum(`heart`,`xp`) | Snapshot reward saat itu. |
| `reward_value` | tinyInt | |
| `xp_awarded` | smallInt | Jika reward XP. |
| `hearts_awarded` | tinyInt | Jika reward heart. |
| `served_at` | datetime | |

### `talent_pool_views`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `company_id` (FK) | bigInt NN | `users.id` dengan role company. |
| `student_id` (FK) | bigInt NN | |
| `source` | enum(`search`,`leaderboard`,`campaign`,`manual`) | Jalur akses. |
| `viewed_at` | datetime | |

### `talent_pool_shortlists`

| Kolom | Tipe | Keterangan |
| --- | --- | --- |
| `id` (PK) | bigInt | |
| `company_id` (FK) | bigInt NN | |
| `student_id` (FK) | bigInt NN | |
| `note` | text nullable | Catatan HR. |
| `priority` | enum(`hot`,`warm`,`cold`) | Urgensi penawaran magang. |
| `next_action_at` | datetime nullable | Reminder follow-up. |

---

## 6. Relasi Kunci (Bird View)

```
users (role=student)──┐
                      ├── student_profiles ── campuses
                      ├── portfolio_projects
                      ├── user_module_progress → modules → learning_tracks
                      ├── user_lesson_progress → lessons → modules
                      ├── user_task_attempts → interactive_tasks → lessons
                      ├── xp_transactions / heart_ledgers / user_daily_stats
                      ├── user_badges ← badges
                      ├── friendships (dua arah)
                      ├── leaderboard_entries → leaderboards
                      ├── subscriptions → subscription_plans
                      ├── rewarded_ad_logs → rewarded_ad_partners
                      └── talent_pool_shortlists (student_id)

users (role=company)──┐
                      ├── company_profiles
                      ├── talent_pool_views
                      └── talent_pool_shortlists (company_id)
```

Dengan struktur ini kita siap bikin migration modular (per domain), seed data awal (tracks, levels, badges), dan hooking Livewire component buat progress/gamifikasi tanpa bikin query spaghetti. Selanjutnya tinggal mapping ke model Eloquent + policy biar aman buat roadmap Technopreneurship kamu. Gaskeun! 💥
