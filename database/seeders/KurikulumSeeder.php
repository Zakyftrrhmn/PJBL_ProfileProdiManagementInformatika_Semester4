<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Pastikan ini ada

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kurikulumData = [];
        // Semester yang diinginkan: 1 hingga 6
        $semesters = ['1', '2', '3', '4', '5', '6'];
        $mataKuliahPerSemester = 5; // Jumlah data per semester

        foreach ($semesters as $semester) {
            for ($i = 1; $i <= $mataKuliahPerSemester; $i++) {
                $judulMk = "Mata Kuliah Semester $semester - " . ($i < 10 ? '0' : '') . $i;
                $kodeMkBase = "MK" . str_pad($semester, 2, '0', STR_PAD_LEFT) . str_pad($i, 2, '0', STR_PAD_LEFT);

                $kurikulumData[] = [
                    'id' => (string) Str::uuid(), // <-- TAMBAHKAN BARIS INI UNTUK UUID
                    'kode_mk' => $kodeMkBase . Str::random(3), // Menambahkan random string agar kode_mk unik
                    'mata_kuliah' => $judulMk,
                    'bentuk_perkuliahan' => ($i % 2 == 0) ? 'Teori' : 'Praktek',
                    'sks' => rand(2, 4), // SKS hanya angka saja
                    'rps' => 'https://example.com/rps/semester_' . $semester . '_' . Str::slug($judulMk) . '.pdf', // Contoh URL RPS
                    'semester' => "Semester " . $semester, // Format 'Semester X'
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Masukkan data ke tabel
        DB::table('kurikulum')->insert($kurikulumData);
    }
}
