<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InformasiUmumResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nama_direktur' => $this->nama_direktur,
            'nama_wakil_direktur' => $this->nama_wakil_direktur,
            'nama_ketua_jurusan' => $this->nama_ketua_jurusan,
            'nama_kaprodi' => $this->nama_kaprodi,
            'nama_koordinator_kampus' => $this->nama_koordinator_kampus,
            'total_mahasiswa' => $this->total_mahasiswa,
            'total_dosen' => $this->total_dosen,
            'total_alumni' => $this->total_alumni,
            'prodi_didirikan' => $this->prodi_didirikan,
            'syarat_masuk' => $this->syarat_masuk,
            'kelas_karyawan' => (bool) $this->kelas_karyawan,
            'gelar_diperoleh' => $this->gelar_diperoleh,
            'bisa_lanjut_s1' => (bool) $this->bisa_lanjut_s1,
            'mendukung_mbkm' => (bool) $this->mendukung_mbkm,
            'ada_pertukaran_pelajar' => (bool) $this->ada_pertukaran_pelajar,
            'fasilitas_prodi' => $this->fasilitas_prodi,
            'ada_labor' => (bool) $this->ada_labor,
            'ada_perpustakaan' => (bool) $this->ada_perpustakaan,
            'wifi_kampus' => (bool) $this->wifi_kampus,
            'akses_lms' => (bool) $this->akses_lms,
            'layanan_disabilitas' => $this->layanan_disabilitas,
            'sistem_informasi_akademik' => $this->sistem_informasi_akademik,
            'daftar_ukm' => $this->daftar_ukm,
            'himpunan_mahasiswa' => $this->himpunan_mahasiswa,
            'ada_kkn' => (bool) $this->ada_kkn,
            'ada_pkm' => (bool) $this->ada_pkm,
            'kegiatan_wirausaha' => $this->kegiatan_wirausaha,
            'ada_beasiswa' => (bool) $this->ada_beasiswa,
            'jenis_beasiswa' => $this->jenis_beasiswa,
            'syarat_beasiswa' => $this->syarat_beasiswa,
            'prospek_kerja' => $this->prospek_kerja,
            'bisa_lanjut_cpns' => (bool) $this->bisa_lanjut_cpns,
            'bisa_lanjut_s2' => (bool) $this->bisa_lanjut_s2,
            'komunitas_alumni' => $this->komunitas_alumni,
            'data_tracer_study' => $this->data_tracer_study,
            'link_kurikulum' => $this->link_kurikulum,
            'link_pendaftaran' => $this->link_pendaftaran,
            'link_pengumuman' => $this->link_pengumuman,
            'last_updated_by' => $this->last_updated_by,
            'created_at' => $this->created_at ? $this->created_at->format('Y-m-d H:i:s') : null,
            'updated_at' => $this->updated_at ? $this->updated_at->format('Y-m-d H:i:s') : null,
        ];
    }
}
