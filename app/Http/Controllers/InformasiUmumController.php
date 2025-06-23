<?php

namespace App\Http\Controllers;

use App\Models\InformasiUmum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Not used in this context, can be removed

class InformasiUmumController extends Controller
{
    /**
     * Display a listing of the resource.
     * Fetches the single InformasiUmum record.
     */
    public function index()
    {
        $informasiUmum = InformasiUmum::first();
        return view('pages.informasi_umum.index', compact('informasiUmum'));
    }

    /**
     * Show the form for creating a new resource.
     * Not allowed as it's a single entry.
     */
    public function create()
    {
        return view('404');
    }

    /**
     * Store a newly created resource in storage.
     * This method will now function as an upsert, creating or updating the single record.
     */
    public function store(Request $request)
    {
        // Redirect to the update method as 'store' is conceptually for new entries,
        // and we only ever have one 'InformasiUmum' record.
        // This makes the route cleaner, treating all submissions as updates to the single record.
        return $this->update($request);
    }

    /**
     * Display the specified resource.
     * Not allowed as there's only a single entry accessed via index.
     */
    public function show(string $id)
    {
        return view('404');
    }

    /**
     * Show the form for editing the specified resource.
     * Not allowed as the edit form should be handled by the index page for the single entry.
     */
    public function edit(string $id)
    {
        return view('404');
    }

    /**
     * Update the specified resource in storage.
     * This method will handle both creating the record if it doesn't exist or updating it.
     */
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate($this->rules());

        // Prepare boolean fields
        $booleanFields = [
            'kelas_karyawan',
            'bisa_lanjut_s1',
            'mendukung_mbkm',
            'ada_pertukaran_pelajar',
            'ada_labor',
            'ada_perpustakaan',
            'wifi_kampus',
            'akses_lms',
            'ada_kkn',
            'ada_pkm',
            'ada_beasiswa',
            'bisa_lanjut_cpns',
            'bisa_lanjut_s2'
        ];

        foreach ($booleanFields as $field) {
            $validatedData[$field] = $request->has($field);
        }

        // Add the last updated by user ID
        $validatedData['last_updated_by'] = auth()->id();

        // Use updateOrCreate to handle both creation and updating of the single record
        InformasiUmum::updateOrCreate(
            [], // Conditions to find the record (empty array means find the first/only one)
            $validatedData // Data to create or update with
        );

        return redirect()->back()->with('success', 'Data informasi umum berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage. Not allowed for single entry.
     */
    public function destroy(string $id)
    {
        return view('404'); // Deleting this single data entry is not allowed
    }

    /**
     * Private helper method for validation rules.
     */
    private function rules()
    {
        return [
            'nama_direktur' => 'nullable|string|max:255',
            'nama_wakil_direktur' => 'nullable|string|max:255',
            'nama_ketua_jurusan' => 'nullable|string|max:255',
            'nama_kaprodi' => 'nullable|string|max:255',
            'nama_koordinator_kampus' => 'nullable|string|max:255',
            'total_mahasiswa' => 'nullable|integer|min:0',
            'total_dosen' => 'nullable|integer|min:0',
            'total_alumni' => 'nullable|integer|min:0',
            'prodi_didirikan' => 'nullable|integer|digits:4|min:1900|max:' . date('Y'),
            'syarat_masuk' => 'nullable|string',
            'kelas_karyawan' => 'boolean',
            'gelar_diperoleh' => 'nullable|string|max:255',
            'bisa_lanjut_s1' => 'boolean',
            'mendukung_mbkm' => 'boolean',
            'ada_pertukaran_pelajar' => 'boolean',
            'fasilitas_prodi' => 'nullable|string',
            'ada_labor' => 'boolean',
            'ada_perpustakaan' => 'boolean',
            'wifi_kampus' => 'boolean',
            'akses_lms' => 'boolean',
            'layanan_disabilitas' => 'nullable|string',
            'sistem_informasi_akademik' => 'nullable|string',
            'daftar_ukm' => 'nullable|string',
            'himpunan_mahasiswa' => 'nullable|string',
            'ada_kkn' => 'boolean',
            'ada_pkm' => 'boolean',
            'kegiatan_wirausaha' => 'nullable|string',
            'ada_beasiswa' => 'boolean',
            'jenis_beasiswa' => 'nullable|string',
            'syarat_beasiswa' => 'nullable|string',
            'prospek_kerja' => 'nullable|string',
            'bisa_lanjut_cpns' => 'boolean',
            'bisa_lanjut_s2' => 'boolean',
            'komunitas_alumni' => 'nullable|string',
            'data_tracer_study' => 'nullable|string',
            'link_kurikulum' => 'nullable|url|max:255',
            'link_pendaftaran' => 'nullable|url|max:255',
            'link_pengumuman' => 'nullable|url|max:255',
        ];
    }
}
