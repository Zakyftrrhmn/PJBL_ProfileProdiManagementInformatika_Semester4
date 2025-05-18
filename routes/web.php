    <?php

    use App\Http\Controllers\ArtikelController;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\DeskripsiController;
    use App\Http\Controllers\DosenController;
    use App\Http\Controllers\GaleryController;
    use App\Http\Controllers\HubungiKamiController;
    use App\Http\Controllers\KalenderAkademikController;
    use App\Http\Controllers\KategoriController;
    use App\Http\Controllers\KurikulumController;
    use App\Http\Controllers\ModulPerkuliahanController;
    use App\Http\Controllers\ProfileKelulusanController;
    use App\Http\Controllers\SilabusController;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\VisiMisiController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\RoleController;
    use App\Http\Controllers\PermissionController;

    Route::get('/', function () {
        return view('layouts.app');
    });
    // Route login/logout tetap dibuka untuk semua
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login-proses', [AuthController::class, 'loginProses'])->name('login.proses');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Route yang hanya bisa diakses jika user sudah login
    Route::middleware(['auth'])->group(function () {

        Route::get('/', function () {
            return view('layouts.app');
        });

        Route::resource('/deskripsi', DeskripsiController::class)->middleware('can:deskripsi');
        Route::resource('/visi_misi', VisiMisiController::class)->middleware('can:visi-misi');
        Route::resource('/kurikulum', KurikulumController::class)->middleware('can:kurikulum');
        Route::resource('/profile_kelulusan', ProfileKelulusanController::class)->middleware('can:profile-kelulusan');
        Route::resource('/dosen', DosenController::class)->middleware('can:dosen');
        Route::resource('/modul_perkuliahan', ModulPerkuliahanController::class)->middleware('can:modul-perkuliahan');
        Route::resource('/silabus', SilabusController::class)->middleware('can:silabus');
        Route::resource('/kalender_akademik', KalenderAkademikController::class)->middleware('can:kalender-akademik');
        Route::resource('/hubungi_kami', HubungiKamiController::class)->middleware('can:hubungi-kami');
        Route::resource('/artikel', ArtikelController::class)->middleware('can:artikel');
        Route::resource('/kategori', KategoriController::class)->middleware('can:kategori');
        Route::resource('/galery', GaleryController::class)->middleware('can:galeri');

        Route::resource('/users', UserController::class)->middleware('can:management-access');
        Route::put('/users/{user}/roles', [UserController::class, 'updateRoles'])->name('users.updateRoles')->middleware('can:management-access');

        Route::resource('roles', RoleController::class)->middleware('can:management-access');
        Route::get('/roles/{role}/permissions', [RoleController::class, 'editPermissions'])->name('roles.permissions.edit')->middleware('can:management-access');
        Route::put('/roles/{role}/permissions', [RoleController::class, 'updatePermissions'])->name('roles.permissions.update')->middleware('can:management-access');

        Route::resource('permissions', PermissionController::class)->middleware('can:management-access');
    });
