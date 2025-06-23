<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Parsedown;

class AiChatSimple extends Component
{
    public $message = '';
    public $chatHistory = [];
    public $processing = false;

    public function mount()
    {
        $this->chatHistory = [];
        $this->chatHistory[] = ['role' => 'model', 'content' => 'Halo! Saya MIPel Bot, asisten AI Anda di Kampus Manajemen Informatika PSDKU Pelalawan. Ada yang bisa saya bantu?'];
    }

    public function sendMessage()
    {
        Log::info('sendMessage called. Message: "' . $this->message . '", Processing: ' . ($this->processing ? 'true' : 'false'));

        if (empty(trim($this->message))) {
            Log::warning('Attempted to send empty message.');
            return;
        }

        if ($this->processing) {
            Log::warning('Attempted to send message while processing is true. Preventing duplicate.');
            return;
        }

        $this->validate([
            'message' => 'required|string|max:1000',
        ]);

        $userMessage = $this->message;

        $this->chatHistory[] = ['role' => 'user', 'content' => $userMessage];

        $this->processing = true;

        $this->reset('message');

        $this->dispatch('messageSent');

        try {
            $client = new Client();
            $geminiApiKey = env('GEMINI_API_KEY');

            if (empty($geminiApiKey)) {
                throw new \Exception("GEMINI_API_KEY tidak ditemukan di file .env. Pastikan sudah diatur.");
            }

            // --- STRATEGI PENCARIAN KONTEKS YANG LEBIH CERDAS DAN TERINTEGRASI ---
            $relevantContext = "";
            $searchKeywords = [];

            // Stop words: Kata-kata umum yang sering muncul tapi tidak spesifik untuk pencarian
            $stopWords = [
                'apa',
                'bagaimana',
                'di',
                'dan',
                'atau',
                'ini',
                'itu',
                'adalah',
                'saya',
                'Anda',
                'yang',
                'tentang',
                'bisa',
                'tolong',
                'minta',
                'kampus',
                'seputar',
                'informasi',
                'tahu',
                'kah',
                'ada',
                'nama',
                'siapa',
                'berapa',
                'tahun',
                'sejak' // Tambahkan "tahun", "sejak"
            ];

            // Pecah pesan pengguna menjadi kata kunci
            $rawKeywords = preg_split('/[\s,;]+/', strtolower($userMessage), -1, PREG_SPLIT_NO_EMPTY);
            foreach ($rawKeywords as $kw) {
                if (strlen($kw) > 2 && !in_array($kw, $stopWords)) {
                    $searchKeywords[] = $kw;
                }
            }

            // Deteksi Niat (Intent Detection) dan tambahkan kata kunci spesifik berdasarkan intent
            $intentSpecificKeywords = [];
            $userMessageLower = strtolower($userMessage);

            // Intent: Nama Kampus / Prodi
            if (
                str_contains($userMessageLower, 'nama kampus') || str_contains($userMessageLower, 'kampus apa') ||
                str_contains($userMessageLower, 'nama prodi') || str_contains($userMessageLower, 'prodi apa') ||
                str_contains($userMessageLower, 'politeknik negeri padang') || str_contains($userMessageLower, 'manajemen informatika')
            ) {
                $intentSpecificKeywords[] = 'politeknik negeri padang';
                $intentSpecificKeywords[] = 'manajemen informatika psdku pelalawan';
                $intentSpecificKeywords[] = 'kampus';
                $intentSpecificKeywords[] = 'prodi';
                $intentSpecificKeywords[] = 'informasi_umum_dasar'; // Source type untuk info manual
            }

            // Intent: Lokasi/Alamat/Kontak
            $locationContactTriggers = ['lokasi', 'alamat', 'dimana', 'letak', 'telepon', 'email', 'wa', 'whatsapp', 'facebook', 'twitter', 'instagram', 'website', 'kontak'];
            foreach ($locationContactTriggers as $trigger) {
                if (str_contains($userMessageLower, $trigger)) {
                    $intentSpecificKeywords[] = 'kontak';
                    $intentSpecificKeywords[] = 'lokasi:';
                    $intentSpecificKeywords[] = 'alamat:';
                    $intentSpecificKeywords[] = 'jalan';
                    $intentSpecificKeywords[] = 'maharaja indra';
                    $intentSpecificKeywords[] = 'pelalawan';
                    $intentSpecificKeywords[] = 'riau';
                    break;
                }
            }

            // Intent: Misi
            if (str_contains($userMessageLower, 'misi prodi') || str_contains($userMessageLower, 'misi kampus')) {
                $intentSpecificKeywords[] = 'misi';
            }

            // Intent: Visi
            if (str_contains($userMessageLower, 'visi prodi') || str_contains($userMessageLower, 'visi kampus')) {
                $intentSpecificKeywords[] = 'visi';
            }

            // Intent: Dosen
            if (str_contains($userMessageLower, 'dosen') || str_contains($userMessageLower, 'pengajar')) {
                $intentSpecificKeywords[] = 'dosen';
            }

            // Intent: Kurikulum
            if (str_contains($userMessageLower, 'kurikulum') || str_contains($userMessageLower, 'mata kuliah')) {
                $intentSpecificKeywords[] = 'kurikulum';
            }

            // Intent: Akreditasi
            if (str_contains($userMessageLower, 'akreditasi') || str_contains($userMessageLower, 'status akreditasi')) {
                $intentSpecificKeywords[] = 'akreditasi';
            }
            // Tambahkan deteksi intent untuk kategori lain yang Anda import (karya_mahasiswa, informasi, kalender_akademik, profile_lulusan, laporan_kepuasan, prestasi_mahasiswa)

            // Intent: Informasi Umum / Pejabat Kampus (Direktur, Kaprodi, dll.) - PENAMBAHAN BARU
            if (
                str_contains($userMessageLower, 'direktur') ||
                str_contains($userMessageLower, 'wakil direktur') ||
                str_contains($userMessageLower, 'ketua jurusan') ||
                str_contains($userMessageLower, 'kaprodi') ||
                str_contains($userMessageLower, 'koordinator kampus') ||
                str_contains($userMessageLower, 'jumlah mahasiswa') ||
                str_contains($userMessageLower, 'total dosen') ||
                str_contains($userMessageLower, 'total alumni') ||
                str_contains($userMessageLower, 'syarat masuk') ||
                str_contains($userMessageLower, 'gelar diperoleh') ||
                str_contains($userMessageLower, 'prospek kerja') ||
                str_contains($userMessageLower, 'fasilitas prodi') ||
                str_contains($userMessageLower, 'layanan disabilitas') ||
                str_contains($userMessageLower, 'sistem informasi akademik') ||
                str_contains($userMessageLower, 'ukm') ||
                str_contains($userMessageLower, 'himpunan mahasiswa') ||
                str_contains($userMessageLower, 'kegiatan wirausaha') ||
                str_contains($userMessageLower, 'beasiswa') ||
                str_contains($userMessageLower, 'tracer study') ||
                str_contains($userMessageLower, 'link kurikulum') ||
                str_contains($userMessageLower, 'link pendaftaran') ||
                str_contains($userMessageLower, 'link pengumuman') ||
                str_contains($userMessageLower, 'kelas karyawan') ||
                str_contains($userMessageLower, 'lanjut s1') ||
                str_contains($userMessageLower, 'mendukung mbkm') ||
                str_contains($userMessageLower, 'pertukaran pelajar') ||
                str_contains($userMessageLower, 'ada labor') ||
                str_contains($userMessageLower, 'ada perpustakaan') ||
                str_contains($userMessageLower, 'wifi kampus') ||
                str_contains($userMessageLower, 'akses lms') ||
                str_contains($userMessageLower, 'ada kkn') ||
                str_contains($userMessageLower, 'ada pkm') ||
                str_contains($userMessageLower, 'jenis beasiswa') ||
                str_contains($userMessageLower, 'syarat beasiswa') ||
                str_contains($userMessageLower, 'lanjut cpns') ||
                str_contains($userMessageLower, 'lanjut s2') ||
                str_contains($userMessageLower, 'komunitas alumni') ||
                str_contains($userMessageLower, 'didirikan')
            ) {
                $intentSpecificKeywords[] = 'informasi_umum'; // Menargetkan source_type 'informasi_umum'
                // Tambahkan kata kunci umum lainnya yang relevan jika diperlukan, misal:
                $intentSpecificKeywords[] = 'nama';
                $intentSpecificKeywords[] = 'berapa';
                $intentSpecificKeywords[] = 'total';
            }


            // Gabungkan semua kata kunci: dari pesan user dan dari deteksi intent
            $finalSearchKeywords = array_unique(array_merge($searchKeywords, $intentSpecificKeywords));

            if (!empty($finalSearchKeywords)) {
                $query = DB::table('campus_knowledge_data');

                // Pastikan 'informasi_umum' dan 'informasi_umum_dasar' ada di sini
                $allSourceTypes = [
                    'visi',
                    'misi',
                    'kontak',
                    'dosen',
                    'kurikulum',
                    'akreditasi',
                    'karya_mahasiswa',
                    'informasi',
                    'kalender_akademik',
                    'profile_lulusan',
                    'laporan_kepuasan',
                    'prestasi_mahasiswa',
                    'informasi_umum',       // <--- PASTIKAN INI ADA
                    'informasi_umum_dasar', // <--- PASTIKAN INI ADA
                ];
                $sourceTypeKeywords = array_intersect($finalSearchKeywords, $allSourceTypes);

                if (!empty($sourceTypeKeywords)) {
                    $query->where(function ($q) use ($sourceTypeKeywords, $finalSearchKeywords) {
                        $q->whereIn('source_type', $sourceTypeKeywords);
                        foreach ($finalSearchKeywords as $keyword) {
                            $q->orWhere('content', 'like', '%' . $keyword . '%');
                        }
                    });
                } else {
                    $query->where(function ($q) use ($finalSearchKeywords) {
                        foreach ($finalSearchKeywords as $keyword) {
                            $q->orWhere('content', 'like', '%' . $keyword . '%');
                            // KOLOM 'title' TELAH DIHAPUS DARI PENCARIAN DI SINI
                        }
                    });
                }

                $foundChunks = $query->limit(10)->get();

                if ($foundChunks->isNotEmpty()) {
                    $contextContents = $foundChunks->pluck('content')->implode("\n\n---\n\n");
                    $relevantContext = "INFORMASI KONTEKS DARI BASIS DATA KAMPUS:\n" . $contextContents . "\n\n";
                }
            }
            // --- AKHIR STRATEGI PENCARIAN KONTEKS ---

            // --- KONSTRUKSI PESAN UNTUK GEMINI API (PROMPTING YANG LEBIH BAIK) ---
            $geminiPromptMessages = [];

            $systemInstruction = "Anda adalah MIPel Bot, asisten AI resmi dari Kampus Manajemen Informatika PSDKU Pelalawan.
            Tugas Anda adalah menjawab pertanyaan pengguna secara informatif, ramah, singkat, dan selalu berdasarkan informasi yang Anda miliki.

            **Aturan Utama Penggunaan Konteks:**
            * **PRIORITASKAN DAN GUNAKAN** informasi yang diberikan dalam bagian 'INFORMASI KONTEKS DARI BASIS DATA KAMPUS' jika konteks tersebut relevan dengan pertanyaan pengguna.
            * Jika konteks diberikan tetapi **tidak secara langsung menjawab** pertanyaan pengguna (misalnya, konteks ada tapi butuh ringkasan), cobalah untuk **menyimpulkan jawaban terbaik** dari konteks yang ada.
            * Jika konteks diberikan, **jangan pernah mengatakan 'saya tidak memiliki informasi'** kecuali setelah Anda yakin bahwa konteks tersebut sama sekali tidak mengandung jawaban yang relevan.
            * Jika konteks **sama sekali tidak relevan** atau **tidak ada**, barulah katakan 'Maaf, saya tidak memiliki informasi spesifik tentang itu.' atau 'Saya tidak memiliki informasi yang cukup untuk menjawab pertanyaan tersebut.' dan tawarkan bantuan lain.
            * Jangan pernah menciptakan informasi atau mengarang jawaban yang tidak didukung oleh konteks yang diberikan atau pengetahuan umum Anda tentang kampus.

            **Aturan Umum:**
            * Gunakan format Markdown untuk jawaban yang lebih terstruktur (misalnya, daftar, bold, italic, poin-poin).
            * Gunakan bahasa Indonesia yang formal dan sopan.
            * Jaga jawaban se-singkat mungkin namun tetap informatif.
            ";

            $geminiPromptMessages[] = [
                'role' => 'user',
                'parts' => [['text' => $systemInstruction]],
            ];
            $geminiPromptMessages[] = [
                'role' => 'model',
                'parts' => [['text' => 'Baik, saya siap membantu!']],
            ];

            $recentChatHistory = array_slice($this->chatHistory, -10);

            foreach ($recentChatHistory as $index => $msg) {
                $role = ($msg['role'] === 'user') ? 'user' : 'model';
                $content = $msg['content'];

                if ($role === 'user' && $index === count($recentChatHistory) - 1) {
                    $combinedContent = $relevantContext . "PERTANYAAN PENGGUNA TERKINI: " . strip_tags($content);
                    $geminiPromptMessages[] = ['role' => 'user', 'parts' => [['text' => $combinedContent]]];
                } else {
                    $geminiPromptMessages[] = ['role' => $role, 'parts' => [['text' => strip_tags($content)]]];
                }
            }

            $response = $client->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key={$geminiApiKey}", [
                'json' => [
                    'contents' => $geminiPromptMessages,
                ]
            ]);

            $responseData = json_decode($response->getBody()->getContents(), true);

            if (isset($responseData['candidates'][0]['content']['parts'][0]['text'])) {
                $aiReply = $responseData['candidates'][0]['content']['parts'][0]['text'];

                $parsedown = new Parsedown();
                $aiReplyHtml = $parsedown->text($aiReply);

                $this->chatHistory[] = ['role' => 'model', 'content' => $aiReplyHtml];
            } else {
                $errorMessage = 'Maaf, saya tidak dapat memahami respons dari AI atau ada masalah. Silakan coba lagi.';
                if (isset($responseData['promptFeedback']['blockReason'])) {
                    $errorMessage .= " Pesan diblokir karena: " . ($responseData['promptFeedback']['blockReason'] ?? 'Tidak diketahui');
                }
                $this->chatHistory[] = ['role' => 'model', 'content' => $errorMessage];
                Log::error("Gemini API unexpected response or blocked: " . json_encode($responseData));
            }
        } catch (\GuzzleHttp\Exception\ClientException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $this->chatHistory[] = ['role' => 'model', 'content' => 'Error API (Client): ' . $responseBody];
            Log::error("Gemini API Client Error: " . $responseBody);
        } catch (\GuzzleHttp\Exception\ServerException $e) {
            $responseBody = $e->getResponse()->getBody()->getContents();
            $this->chatHistory[] = ['role' => 'model', 'content' => 'Error Server API: ' . $responseBody];
            Log::error("Gemini API Server Error: " . $responseBody);
        } catch (\Exception $e) {
            $this->chatHistory[] = ['role' => 'model', 'content' => 'Terjadi kesalahan umum: ' . $e->getMessage()];
            Log::error("General AI Chat Error: " . $e->getMessage());
        } finally {
            $this->processing = false;
        }
    }

    public function render()
    {
        return view('livewire.ai-chat-simple');
    }
}
