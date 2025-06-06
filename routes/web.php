    <?php

    use App\Http\Controllers\AkreditasiController;
    use App\Http\Controllers\AlasanBergabungController;
    use App\Http\Controllers\KeryaMahasiswaController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\DosenController;
    use App\Http\Controllers\Frontside\AkreditasiController as FrontsideAkreditasiController;
    use App\Http\Controllers\Frontside\FrontsideController as FrontsideFrontsideController;
    use App\Http\Controllers\Frontside\GaleriController;
    use App\Http\Controllers\Frontside\InformasiController as FrontsideInformasiController;
    use App\Http\Controllers\Frontside\KalenderAkademikController as FrontsideKalenderAkademikController;
    use App\Http\Controllers\Frontside\KaryaMahasiswaController;
    use App\Http\Controllers\Frontside\KontakController as FrontsideKontakController;
    use App\Http\Controllers\Frontside\KurikulumController as FrontsideKurikulumController;
    use App\Http\Controllers\Frontside\LaporanKepuasanController as FrontsideLaporanKepuasanController;
    use App\Http\Controllers\Frontside\PrestasiMahasiswaController as FrontsidePrestasiMahasiswaController;
    use App\Http\Controllers\Frontside\ProfilKelulusanController as FrontsideProfilKelulusanController;
    use App\Http\Controllers\FrontsideController;
    use App\Http\Controllers\GalleryController;
    use App\Http\Controllers\HubungiKamiController;
    use App\Http\Controllers\InformasiController;
    use App\Http\Controllers\KalenderAkademikController;
    use App\Http\Controllers\KategoriController;
    use App\Http\Controllers\KategoriKaryaController;
    use App\Http\Controllers\KontakController;
    use App\Http\Controllers\KurikulumController;
    use App\Http\Controllers\LaporanKepuasanController;
    use App\Http\Controllers\MisiController;
    use App\Http\Controllers\ProfileKelulusanController;
    use App\Http\Controllers\UserController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\PermissionController;
    use App\Http\Controllers\PrestasiMahasiswaController;
    use App\Http\Controllers\visiController;

    Route::get('/', [FrontsideFrontsideController::class, 'index'])->name('beranda');
    Route::get('/kurikulum', [FrontsideFrontsideController::class, 'kurikulum'])->name('kurikulum');
    Route::get('/akreditasi', [FrontsideFrontsideController::class, 'akreditasi'])->name('akreditasi');
    Route::get('/kalender_akademik', [FrontsideFrontsideController::class, 'kalender_akademik'])->name('kalender_akademik');
    Route::get('/profile_lulusan', [FrontsideFrontsideController::class, 'profile_lulusan'])->name('profile_lulusan');
    Route::get('/laporan_kepuasan', [FrontsideFrontsideController::class, 'laporan_kepuasan'])->name('laporan_kepuasan');

    Route::get('/karya_mahasiswa', [FrontsideFrontsideController::class, 'karya_mahasiswa'])->name('karya_mahasiswa');
    Route::get('/karya_mahasiswa/{slug}', [FrontsideFrontsideController::class, 'showKaryaMahasiswa'])->name('karya_mahasiswa.detail');

    Route::get('/informasi', [FrontsideFrontsideController::class, 'informasi'])->name('informasi');
    Route::get('/informasi/{slug}', [FrontsideFrontsideController::class, 'showInformasi'])->name('informasi.detail');


    Route::get('/galeri', [FrontsideFrontsideController::class, 'galeri'])->name('galeri');
    Route::get('/prestasi_mahasiswa', [FrontsideFrontsideController::class, 'prestasi_mahasiswa'])->name('prestasi_mahasiswa');

    Route::get('/hubungi_kami', [FrontsideFrontsideController::class, 'hubungi_kami'])->name('hubungi_kami');
    Route::post('/hubungi_kami_proses', [FrontsideFrontsideController::class, 'hubungi_kami_proses'])->name('hubungi_kami_proses');



    // Route login/logout tetap dibuka untuk semua
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'loginProses'])->name('login.proses');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route yang hanya bisa diakses jika user sudah login
    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

        Route::get('/', function () {
            return view('layouts.app');
        });

        Route::resource('/dashboard', DashboardController::class)->middleware('can:dashboard');
        Route::resource('/kurikulum', KurikulumController::class)->middleware('can:kurikulum');
        Route::resource('/dosen', DosenController::class)->middleware('can:dosen');
        Route::resource('/kalender_akademik', KalenderAkademikController::class)->middleware('can:kalender-akademik');
        Route::resource('/akreditasi', AkreditasiController::class)->middleware('can:akreditasi');
        Route::resource('/profile_kelulusan', ProfileKelulusanController::class)->middleware('can:profile-kelulusan');
        Route::resource('/laporan_kepuasan', LaporanKepuasanController::class)->middleware('can:laporan_kepuasan');
        Route::resource('/gallery', GalleryController::class)->middleware('can:gallery');
        Route::resource('/prestasi_mahasiswa', PrestasiMahasiswaController::class)->middleware('can:prestasi_mahasiswa');

        Route::resource('/karya_mahasiswa', KeryaMahasiswaController::class)->middleware('can:karya_mahasiswa');
        Route::resource('/kategori_karya', KategoriKaryaController::class)->middleware('can:karya_mahasiswa');

        Route::resource('/informasi', InformasiController::class)->middleware('can:publish');
        Route::resource('/kategori_informasi', KategoriController::class)->middleware('can:publish');

        Route::resource('/visi', visiController::class)->middleware('can:manajemen_konten');
        Route::resource('/misi', MisiController::class)->middleware('can:manajemen_konten');
        Route::resource('/alasan_bergabung', AlasanBergabungController::class)->middleware('can:manajemen_konten');
        Route::resource('/kontak', KontakController::class)->middleware('can:manajemen_konten');
        Route::resource('/frontside', FrontsideController::class)->middleware('can:manajemen_konten');

        Route::resource('hubungi_kami', HubungiKamiController::class)->middleware('can:manajemen_konten');

        Route::resource('/users', UserController::class)->middleware('can:management-access');
        Route::put('/users/{user}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles')->middleware('can:management-access');

        Route::resource('roles', RoleController::class)->middleware('can:management-access');
        Route::get('/roles/{role}/permissions', [RoleController::class, 'editPermissions'])->name('roles.permissions.edit')->middleware('can:management-access');
        Route::put('/roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.permissions.update')->middleware('can:management-access');

        Route::resource('permissions', PermissionController::class)->middleware('can:management-access');
    });
