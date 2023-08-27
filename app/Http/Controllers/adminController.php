<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Nim, User, Pengaturan_TA, Tugas_Akhir, Story_ACC, Notification
};
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    // Dassboard Admin
        // show dassboard admin
        public function show_dassboard_admin()
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            switch (auth()->user()->penanggung_jawab_jurusan) {
                case "Alat Berat":
                $user_login = 'jurusan_Alat_Berat';
                break;
                case "Teknik Komputer":
                $user_login = 'jurusan_Teknik_Komputer';
                break;
                case "Teknik Mesin":
                $user_login = 'jurusan_Teknik_Mesin';
                break;
                case "Mekanik Otomotif":
                $user_login = 'jurusan_Mekanik_Otomotif';
                break;
                case "Akuntansi":
                $user_login = 'jurusan_Akuntansi';
                break;
                case "Teknik Elektronika":
                $user_login = 'jurusan_Teknik_Elektronika';
                break;
                case "Teknik Kimia":
                $user_login = 'jurusan_Teknik_Kimia';
                break;
                case "Rekam Medik dan Informasi Kesehatan":
                $user_login = 'jurusan_Rekam_Medik';
                break;
                case "Teknik Sipil":
                $user_login = 'jurusan_Teknik_Sipil';
                break;
                case "Teknik Informatika":
                $user_login = 'jurusan_Teknik_Informatika';
                break;
                case "Komputerisasi Akutansi":
                $user_login = 'jurusan_Komputerisasi_Akutansi';
                break;
                case "Mekanik Industri dan Desain":
                $user_login = 'jurusan_MID';
                break;
                case "Teknik Otomasi Industri":
                $user_login = 'jurusan_TOI';
                break;
                default:
                $user_login = 'jurusan_Mekatronik';
            }

            // show dassboard admin
            if (auth()->user()->user_status == "admin") {
                switch (auth()->user()->penanggung_jawab_jurusan) {
                    case "Alat Berat":
                    $admin_login = 'Alat_Berat';
                    break;
                    case "Teknik Komputer":
                    $admin_login = 'Teknik_Komputer';
                    break;
                    case "Teknik Mesin":
                    $admin_login = 'Teknik_Mesin';
                    break;
                    case "Mekanik Otomotif":
                    $admin_login = 'Mekanik_Otomotif';
                    break;
                    case "Akuntansi":
                    $admin_login = 'Akuntansi';
                    break;
                    case "Teknik Elektronika":
                    $admin_login = 'Teknik_Elektronika';
                    break;
                    case "Teknik Kimia":
                    $admin_login = 'Teknik_Kimia';
                    break;
                    case "Rekam Medik dan Informasi Kesehatan":
                    $admin_login = 'Rekam_Medik';
                    break;
                    case "Teknik Sipil":
                    $admin_login = 'Teknik_Sipil';
                    break;
                    case "Teknik Informatika":
                    $admin_login = 'Teknik_Informatika';
                    break;
                    case "Komputerisasi Akutansi":
                    $admin_login = 'Komputerisasi_Akutansi';
                    break;
                    case "Mekanik Industri dan Desain":
                    $admin_login = 'MID';
                    break;
                    case "Teknik Otomasi Industri":
                    $admin_login = 'TOI';
                    break;
                    case "Mekatronik":
                    $admin_login = 'Mekatronik';
                    break;
                    default:
                    // increment admin login count
                    $admin_login = 'admin_login_count';
                }
                $get_admin = User::where('penanggung_jawab_jurusan', auth()->user()->penanggung_jawab_jurusan)->count();
                $get_user = User::where('jurusan', auth()->user()->penanggung_jawab_jurusan)->count();
                $status_nonaktif = User::where('jurusan', auth()->user()->penanggung_jawab_jurusan)->where('status', 'nonaktif')->count();
                $get_TA = Tugas_Akhir::where('jurusan', auth()->user()->penanggung_jawab_jurusan)->count();
                $menunggu_acc = Tugas_Akhir::where('jurusan', auth()->user()->penanggung_jawab_jurusan)->where('status', 'menunggu')->count();
                $aplikasi_TA = Tugas_Akhir::where('jurusan', auth()->user()->penanggung_jawab_jurusan)->whereNotNull('file_TA.file_program')->count();
                $link_video = Tugas_Akhir::where('jurusan', auth()->user()->penanggung_jawab_jurusan)->whereNotNull('file_TA.link_video')->count();

            }elseif (auth()->user()->user_status == "super admin") {
                $admin_login = 'admin_login_count';
                $get_admin = User::whereIn('user_status', ['admin', 'super admin'])->count();
                $get_user = User::where('user_status', 'user')->count();
                $status_nonaktif = User::where('status', 'nonaktif')->count();
                $get_TA = Tugas_Akhir::count();
                $menunggu_acc = Tugas_Akhir::where('status', 'menunggu')->count();
                $aplikasi_TA = Tugas_Akhir::whereNotNull('file_TA.file_program')->count();
                $link_video = Tugas_Akhir::whereNotNull('file_TA.link_video')->count();
            }

            return view('admin.dassboard.dassboard_admin', [
                'userLogin' => $user_login,
                'adminLogin' => $admin_login,
                'totalAdmin' => $get_admin,
                'totalUser' => $get_user,
                'totalTA' => $get_TA,
                'total_menungguACC' => $menunggu_acc,
                'aplikasiTA' => $aplikasi_TA,
                'linkVideo' => $link_video,
                'statusNonaktif' => $status_nonaktif,
                'count' => $count
            ]);
        }


    // Daftar Tugas Akhir
        // show daftar tugas akhir
        public function show_daftar_tugas_akhir(Request $request)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            $search = $request->input('search');
            $jurusan = $request->input('jurusan');
            $startYear = $request->input('startYear');
            $endYear = $request->input('endYear');

            // Mengubah input pencarian menjadi lowercase
            $regex = strtolower($search);
            
            $query = Tugas_Akhir::where('status', 'ACC');

            if ($search) {
                // Melakukan pencarian dengan menggunakan regex case-insensitive pada kolom 'judul'
                $query->where(function ($query) use ($regex) {
                    $query->whereRaw([
                        'judul' => ['$regex' => $regex, '$options' => 'i']
                    ])->orWhereRaw([
                        'nama' => ['$regex' => $regex, '$options' => 'i']
                    ])->orWhereRaw([
                        'nim' => ['$regex' => $regex, '$options' => 'i']
                    ])->orWhereRaw([
                        'abstrak' => ['$regex' => $regex, '$options' => 'i']
                    ])->orWhereRaw([
                        'kata_kunci' => ['$regex' => $regex, '$options' => 'i']
                    ]);
                });
            
            } else {
                // Tampilkan semua data jika tidak ada pencarian
                $get_TA = Tugas_Akhir::where('status', 'ACC')->paginate(15);
                return view('admin.daftar_tugas_akhir.daftar_tugas_akhir', ['showTA' => $get_TA, 'count' => $count]);
            }

            if ($jurusan) {
                $query->where('jurusan', $jurusan);
            }

            if ($startYear && $endYear) {
                $query->whereRaw([
                    'created_at' => [
                        '$gte' => new \MongoDB\BSON\UTCDateTime(strtotime("$startYear-01-01") * 1000),
                        '$lte' => new \MongoDB\BSON\UTCDateTime(strtotime("$endYear-12-31") * 1000),
                    ],
                ]);

            }elseif ($startYear) {
                $query->whereRaw([
                    'created_at' => [
                        '$gte' => new \MongoDB\BSON\UTCDateTime(strtotime("$startYear-01-01") * 1000),
                    ],
                ]);
            
            }elseif ($endYear) {
                $query->whereRaw([
                    'created_at' => [
                        '$lte' => new \MongoDB\BSON\UTCDateTime(strtotime("$endYear-12-31") * 1000),
                    ],
                ]);
            }

            $filteredData = $query->paginate(15);

            return view('admin.daftar_tugas_akhir.daftar_tugas_akhir', ['showTA' => $filteredData, 'count' => $count]);

        }
        // destroy tugas akhir
        public function destroy_tugas_akhir($id)
        {
            $hapus_TA = Tugas_Akhir::find($id);

            if ($hapus_TA) {
                $hapus_TA->delete();

                return redirect()->route('daftar-tugas-akhir')->with('destroy', 'Tugas Akhir yang di pilih berhasil di Hapus');
            }

            return redirect()->route('daftar-tugas-akhir')->with('failed', 'Tugas Akhir yang di pilih gagal di hapus');
            
        }
        // show daftar tugas akhir detail
        public function show_daftar_tugas_akhir_detail($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();
            
            // show daftar tugas akhir detail
            $get_detail = Tugas_Akhir::find($id);
            return view('admin.daftar_tugas_akhir.daftar_tugas_akhir_detail', ['showDetail' => $get_detail, 'count' => $count]);
        }
        // show download file daftar tugas akhir
        public function show_daftar_tugas_akhir_file($nama_file, $id)
        {
            $get_file = Tugas_Akhir::find($id);
            $file = $get_file->file_TA[$nama_file];

            $stream = Storage::disk('local')->readStream($file['path']);

            return response()->stream(function() use ($stream) { fpassthru($stream); }, 200, [
                'Content-Type' => $file['mime'],
                'Content-Disposition' => 'inline; filename="'.$file['original_filename'].'"'
            ]);
        }


    // Halaman Menunggu ACC
        // show menunggu acc
        public function show_menunggu_acc(Request $request)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            $search = $request->input('search');

            if ($search) {
                // Mengubah input pencarian menjadi lowercase
                $regex = strtolower($search);

                // Melakukan pencarian dengan menggunakan regex case-insensitive
                $show_data = auth()->user()->penanggung_jawab_jurusan == "Semua Jurusan" ? 
                    Tugas_Akhir::where('status', 'menunggu')->where(function ($query) use ($regex) {
                        $query->whereRaw([
                            'judul' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nama' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nim' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'kelas' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jurusan' => ['$regex' => $regex, '$options' => 'i']
                        ]);
                    })
                    ->paginate(15)
                : 
                    Tugas_Akhir::where('status', 'menunggu')->where('jurusan', auth()->user()->penanggung_jawab_jurusan)->where(function ($query) use ($regex) {
                        $query->whereRaw([
                            'judul' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nama' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nim' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'kelas' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jurusan' => ['$regex' => $regex, '$options' => 'i']
                        ]);
                    })
                    ->paginate(15);

                return view('admin.menunggu_ACC.menunggu_ACC', ['show_data' => $show_data, 'count' => $count]);

            } else {
                // show menunggu acc
                $show_data = auth()->user()->penanggung_jawab_jurusan == "Semua Jurusan" ? Tugas_Akhir::where('status', 'menunggu')->paginate(15) : Tugas_Akhir::where('status', 'menunggu')->where('jurusan', auth()->user()->penanggung_jawab_jurusan)->paginate(15);
                return view('admin.menunggu_ACC.menunggu_ACC', ['show_data' => $show_data, 'count' => $count]);
            }
        }

        // show menunggu acc detail
        public function show_menunggu_acc_detail($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            // show menuggu acc detail
            $detail_acc = Tugas_Akhir::find($id);
            return view('admin.menunggu_ACC.menunggu_ACC_detail', ['detailACC' => $detail_acc, 'count' => $count]);
        }

        // store tugas akhir yang di acc
        public function acc_tugas_akhir($id)
        {
            $acc = Tugas_Akhir::find($id);

            if ($acc) {
                $acc->status = "ACC";
                $acc->save();

                // kirim ke database story
                $story = Story_ACC::create([
                    'judul' => $acc->judul,
                    'nama' => $acc->nama,
                    'nim' => $acc->nim,
                    'jurusan' => $acc->jurusan, 
                    'keterangan' => "Tugas Akhir anda sudah di ACC",
                    'perespon' => auth()->user()->nama_lengkap,
                    'status' => $acc->status,
                ]);

                // kirim ke database notifikasi (notifikasi ke user)
                $notifikasi = Notification::create([
                    'title' => $acc->judul,
                    'message' => "Tugas Akhir anda sudah di ACC",
                    'jenis' => "tugas akhir",
                    'perespon' => auth()->user()->nama_lengkap,
                    'status' => $acc->status,
                    'user_id' => $acc->user_id,
                    'is_read' => "unread",
                ]);


                // kirim ke database notifikasi (notifikasi ke penanggung jawab semua jurusan)
                $semua_jurusan = User::where('penanggung_jawab_jurusan', "Semua Jurusan")->get();
                foreach ($semua_jurusan as $user) {
                    $notifikasi = Notification::create([
                        'title' => $acc->judul,
                        'message' => "Tugas Akhir anda sudah di ACC",
                        'jenis' => "tugas akhir",
                        'perespon' => auth()->user()->nama_lengkap,
                        'status' => $acc->status,
                        'user_id' => $user->_id,
                        'is_read' => "unread",
                    ]);
                }

                // kirim ke database notifikasi (notifikasi ke admin penanggung jawab jurusan)
                $jurusan = User::where('penanggung_jawab_jurusan', $acc->jurusan)->get();
                foreach ($jurusan as $user) {
                    $notifikasi = Notification::create([
                        'title' => $acc->judul,
                        'message' => "Tugas Akhir anda sudah di ACC",
                        'jenis' => "tugas akhir",
                        'perespon' => auth()->user()->nama_lengkap,
                        'status' => $acc->status,
                        'user_id' => $user->_id,
                        'is_read' => "unread",
                    ]);
                }

                return redirect()->route('menunggu-acc')->with('success', 'Tugas Akhir yang di pilih berhasil di ACC');
            }
            return redirect()->route('menunggu-acc')->with('failed', 'Tugas Akhir yang di pilih tidak tersedia');
        }

        // store tugas akhir yang di tolak
        public function tolak_tugas_akhir(Request $request, $id)
        {
            $tolak = Tugas_Akhir::find($id);

            $keterangan = ($request->keterangan) ? $request->keterangan : "Tidak ada keterangan";

            if ($tolak) {

                // kirim ke database story
                $story = Story_ACC::create([
                    'judul' => $tolak->judul,
                    'nama' => $tolak->nama,
                    'nim' => $tolak->nim,
                    'jurusan' => $tolak->jurusan,
                    'keterangan' => $keterangan,
                    'perespon' => auth()->user()->nama_lengkap,
                    'status' => "TOLAK",
                ]);

                // kirim ke database notifikasi (notifikasi ke user)
                $notifikasi = Notification::create([
                    'title' => $tolak->judul,
                    'message' => $keterangan,
                    'jenis' => "tugas akhir",
                    'perespon' => auth()->user()->nama_lengkap,
                    'status' => "TOLAK",
                    'user_id' => $tolak->user_id,
                    'is_read' => "unread",
                ]);

                // kirim ke database notifikasi (notifikasi ke penanggung jawab semua jurusan)
                $semua_jurusan = User::where('penanggung_jawab_jurusan', "Semua Jurusan")->get();
                foreach ($semua_jurusan as $user) {
                    $notifikasi = Notification::create([
                        'title' => $tolak->judul,
                        'message' => $keterangan,
                        'jenis' => "tugas akhir",
                        'perespon' => auth()->user()->nama_lengkap,
                        'status' => "TOLAK",
                        'user_id' => $user->_id,
                        'is_read' => "unread",
                    ]);
                }

                // kirim ke database notifikasi (notifikasi ke admin penanggung jawab jurusan)
                $jurusan = User::where('penanggung_jawab_jurusan', $tolak->jurusan)->get();
                foreach ($jurusan as $user) {
                    $notifikasi = Notification::create([
                        'title' => $tolak->judul,
                        'message' => $keterangan,
                        'jenis' => "tugas akhir",
                        'perespon' => auth()->user()->nama_lengkap,
                        'status' => "TOLAK",
                        'user_id' => $user->_id,
                        'is_read' => "unread",
                    ]);
                }

                $tolak->delete();

                return redirect()->route('menunggu-acc')->with('success', 'Tugas Akhir yang di pilih berhasil di tolak');
            }
            return redirect()->route('menunggu-acc')->with('failed', 'Tugas Akhir yang di pilih tidak tersedia');
        }


    // Halaman Daftar di ACC/Tolak
        // show daftar di acc/tolak
        public function show_daftar_status_acc(Request $request)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            $search = $request->input('search');

            if ($search) {
                // Mengubah input pencarian menjadi lowercase
                $regex = strtolower($search);

                // Melakukan pencarian dengan menggunakan regex case-insensitive
                $get_story = auth()->user()->penanggung_jawab_jurusan == "Semua Jurusan" ? 
                    Story_ACC::where(function ($query) use ($regex) {
                        $query->whereRaw([
                            'judul' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nama' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nim' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jurusan' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'keterangan' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'perespon' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'status' => ['$regex' => $regex, '$options' => 'i']
                        ]);
                    })
                    ->paginate(10) 
                : 
                    Story_ACC::where('jurusan', auth()->user()->penanggung_jawab_jurusan)->where(function ($query) use ($regex) {
                        $query->whereRaw([
                            'judul' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nama' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nim' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jurusan' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'keterangan' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'perespon' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'status' => ['$regex' => $regex, '$options' => 'i']
                        ]);
                    })
                    ->paginate(10);

                return view('admin.daftar_status_ACC.daftar_status_ACC', ['getStory' => $get_story, 'count' => $count]);

            } else {
                // show menunggu acc
                $get_story = auth()->user()->penanggung_jawab_jurusan == "Semua Jurusan" ? Story_ACC::paginate(10) : Story_ACC::where('jurusan', auth()->user()->penanggung_jawab_jurusan)->paginate(10);
                return view('admin.daftar_status_ACC.daftar_status_ACC', ['getStory' => $get_story, 'count' => $count]);
            }
        }
        // destroy daftar status
        public function destroy_daftar_status($id)
        {
            $destroy_Story = Story_ACC::find($id);

            if ($destroy_Story) {
                $destroy_Story->delete();

            return redirect()->route('daftar-status-acc')->with('destroy', 'Data yang anda pilih berhasil di hapus');
            }

            return redirect()->route('daftar-status-acc')->with('failed', 'Data yang anda pilih tidak tersedia');
        }


    // Pengaturan Tugas Akhir
        // show pengaturan tugas akhir
        public function show_pengaturan_TA()
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            // show pengaturan tugas akhir
            $pengaturan_TA = Pengaturan_TA::get();
            return view('admin.pengaturan_TA.pengaturan_TA', ['pengaturan_TA' => $pengaturan_TA, 'count' => $count]);
        }
        // store pengaturan tugas akhir
        public function store_pengaturan_TA(Request $request, $id)
        {
            // untuk menambahkan data
            // $pengaturan = new Pengaturan_TA;

            // untuk update data
            $pengaturan = Pengaturan_TA::find($id);
            $pengaturan->bab1 = $request->pengaturan_file_bab1;
            $pengaturan->bab2 = $request->pengaturan_file_bab2;
            $pengaturan->bab3 = $request->pengaturan_file_bab3;
            $pengaturan->bab4 = $request->pengaturan_file_bab4;
            $pengaturan->bab5 = $request->pengaturan_file_bab5;
            $pengaturan->file_program = $request->pengaturan_file_program;
            $pengaturan->link_video = $request->pengaturan_link_video;
            
            $pengaturan->save();

            return redirect()->route('pengaturan-tugas-akhir')->with('success', 'Pengaturan berhasil di update...');
        }


    // Halaman Admin
        // show daftar admin 
        public function show_daftar_admin(Request $request)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            $search = $request->input('search');

            if ($search) {
                // Mengubah input pencarian menjadi lowercase
                $regex = strtolower($search);

                // Melakukan pencarian dengan menggunakan regex case-insensitive
                $daftar_admin = User::whereIn('user_status', ['admin', 'super admin'])
                    ->where(function ($query) use ($regex) {
                        $query->whereRaw([
                            'nama_lengkap' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jenis_kelamin' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jabatan' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'user_status' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'penanggung_jawab_jurusan' => ['$regex' => $regex, '$options' => 'i']
                        ]);
                    })
                    ->paginate(10);

                return view('admin.halaman_admin.daftar_admin', ['daftarAdmin' => $daftar_admin, 'count' => $count]);
            } else {
                // Tampilkan semua data jika tidak ada pencarian
                $daftar_admin = User::whereIn('user_status', ['admin', 'super admin'])->paginate(10);
                return view('admin.halaman_admin.daftar_admin', ['daftarAdmin' => $daftar_admin, 'count' => $count]);
            }
        }

        // show tambah admin
        public function show_tambah_admin()
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            return view('admin.halaman_admin.tambah_admin', ['count' => $count]);
        }

        // store tambah admin
        public function store_admin(Request $request)
        {
            $validatedData = $request->validate([
                'nama_lengkap' => ['required', 'min:3', 'max:50'],
                'nip' => 'required',
                'email' => ['required','unique:users', 'email:dns'],
                'jenis_kelamin' => 'required',
                'nomor_hp' => 'required',
                'jabatan' => 'required',
                'penanggung_jawab_jurusan' => 'required',
                'user_status' => 'required',
                'password' => ['required', 'min:8', 'max:255', 'confirmed'],
            ]);

            $validatedData['status'] = "aktif";
            $validatedData['image'] = new \MongoDB\BSON\Binary('', \MongoDB\BSON\Binary::TYPE_GENERIC);
            $validatedData['password'] = bcrypt($validatedData['password']);

            // notifikasi
            if($validatedData['penanggung_jawab_jurusan'] == "Semua Jurusan")
            {
                // kirim ke database notifikasi (notifikasi ke sesama admin penanggung jawab jurusan dan ke user admin)
                $notifikasi_tambah_admin = User::whereIn('user_status', ['admin', 'super admin'])->get();
                foreach ($notifikasi_tambah_admin as $tambah) {
                    $notifikasi = Notification::create([
                        'title' => "Piwwiittt.. ada " . strtoupper($validatedData['user_status']) . " Baru nih",
                        'message' => "Hai, ada " . $validatedData['user_status'] . " baru nih yang bernama " . $validatedData['nama_lengkap'] . ". " . $validatedData['user_status'] . " ini dibuatkan oleh " . auth()->user()->nama_lengkap . " yang berstatus sebagai " . auth()->user()->user_status,
                        'jenis' => "tambah admin",
                        'perespon' => auth()->user()->nama_lengkap,
                        'user_id' => $tambah->_id,
                        'is_read' => "unread",
                    ]);
                }
            }else{
                // kirim ke database notifikasi (notifikasi ke sesama admin penanggung jawab jurusan dan ke user admin)
                $notifikasi_tambah_admin = User::where('penanggung_jawab_jurusan', $validatedData['penanggung_jawab_jurusan'])->whereIn('user_status', ['admin', 'super admin'])->get();
                foreach ($notifikasi_tambah_admin as $tambah) {
                    $notifikasi = Notification::create([
                        'title' => "Piwwiittt.. ada " . strtoupper($validatedData['user_status']) . " Baru nih",
                        'message' => "Hai, ada " . $validatedData['user_status'] . " baru nih yang bernama " . $validatedData['nama_lengkap'] . ". " . $validatedData['user_status'] . " ini dibuatkan oleh " . auth()->user()->nama_lengkap . " yang berstatus sebagai " . auth()->user()->user_status,
                        'jenis' => "tambah admin",
                        'perespon' => auth()->user()->nama_lengkap,
                        'user_id' => $tambah->_id,
                        'is_read' => "unread",
                    ]);
                }
            }
            
            $admin = User::create($validatedData);
            return redirect()->route('tambah-admin')->with('success', 'Data berhasil di tambahkan');
        }

        // show daftar admin detail
        public function show_daftar_admin_detail($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();
            
            // show daftar admin detail
            $admin_detail = User::find($id);
            return view('admin.halaman_admin.daftar_admin_detail', ['adminDetail' => $admin_detail, 'count' => $count]);
        }

        // show edit admin
        public function show_edit_admin($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();
            
            // show edit admin
            $admin_edit = User::find($id);
            return view('admin.halaman_admin.edit_admin', ['adminEdit' => $admin_edit, 'count' => $count]);
        }

        // store edit admin
        public function store_edit_admin(Request $request, $id)
        {
            $store_admin = User::find($id);
    
            if ($store_admin) {
                $store_admin->nama_lengkap = $request->nama_lengkap;
                $store_admin->nomor_hp = $request->nomor_hp;
                $store_admin->email = $request->email;
                $store_admin->nip = $request->nip;
                $store_admin->jenis_kelamin = $request->jenis_kelamin;
                $store_admin->jabatan = $request->jabatan;
                $store_admin->penanggung_jawab_jurusan = $request->penanggung_jawab_jurusan;
                $store_admin->user_status = $request->user_status;

                $store_admin->save();

                return redirect()->route('daftar-admin')->with('success', 'Data yang anda ubah berhasil di simpan');
            } else {
                return redirect()->route('daftar-admin')->with('failed', 'Data yang anda edit gagal di simpan');
            }
        }

        // destroy admin
        public function destroy_admin($id)
        {
            $destroy_admin = User::find($id);

            if ($destroy_admin) {
                $destroy_admin->delete();
                return redirect()->route('daftar-admin')->with('destroy', 'Data yang anda pilih berhasil di hapus');
            } else{
                return redirect()->route('daftar-admin')->with('failed', 'Data yang anda pilih gagal di hapus');
            }
        }


    // Halaman User
        // show daftar user
        public function show_daftar_user(Request $request)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();
            
            $search = $request->input('search');

            if (auth()->user()->jabatan == "Akademik" || auth()->user()->jabatan == "Pustakawan") {
                if ($search) {
                    // Mengubah input pencarian menjadi lowercase
                    $regex = strtolower($search);

                    // Melakukan pencarian dengan menggunakan regex case-insensitive
                    $get_user = User::where('user_status', 'user')->where('status', 'aktif')->where(function ($query) use ($regex) {
                        $query->whereRaw([
                                'nama_lengkap' => ['$regex' => $regex, '$options' => 'i']
                            ])->orWhereRaw([
                                'nim' => ['$regex' => $regex, '$options' => 'i']
                            ])->orWhereRaw([
                                'jenis_kelamin' => ['$regex' => $regex, '$options' => 'i']
                            ])->orWhereRaw([
                                'jurusan' => ['$regex' => $regex, '$options' => 'i']
                            ]);
                        })
                        ->paginate(10);

                    return view('admin.halaman_user.daftar_user', ['getUser' => $get_user, 'count' => $count]);
                } else {
                    // Tampilkan semua data jika tidak ada pencarian
                    $get_user = User::where('user_status', 'user')->where('status', 'aktif')->paginate(10);
                    return view('admin.halaman_user.daftar_user', ['getUser' => $get_user, 'count' => $count]);
                }
            }
            elseif(auth()->user()->jabatan == "Prodi"){
                if ($search) {
                    // Mengubah input pencarian menjadi lowercase
                    $regex = strtolower($search);

                    // Melakukan pencarian dengan menggunakan regex case-insensitive
                    $get_user = User::where('user_status', 'user')->where('status', 'aktif')->where('jurusan', auth()->user()->penanggung_jawab_jurusan)->where(function ($query) use ($regex) {
                        $query->whereRaw([
                                'nama_lengkap' => ['$regex' => $regex, '$options' => 'i']
                            ])->orWhereRaw([
                                'nim' => ['$regex' => $regex, '$options' => 'i']
                            ])->orWhereRaw([
                                'jenis_kelamin' => ['$regex' => $regex, '$options' => 'i']
                            ])->orWhereRaw([
                                'jurusan' => ['$regex' => $regex, '$options' => 'i']
                            ]);
                        })
                        ->paginate(10);

                    return view('admin.halaman_user.daftar_user', ['getUser' => $get_user, 'count' => $count]);
                } else {
                    // Tampilkan semua data jika tidak ada pencarian
                    $get_user = User::where('user_status', 'user')->where('status', 'aktif')->where('jurusan', auth()->user()->penanggung_jawab_jurusan)->paginate(10);
                    return view('admin.halaman_user.daftar_user', ['getUser' => $get_user, 'count' => $count]);
                }
            }
        }

        // show daftar user detail
        public function show_daftar_user_detail($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            // daftar user detail
            $user_detail = User::find($id);
            return view('admin.halaman_user.daftar_user_detail', ['userDetail' => $user_detail, 'count' => $count]);
        }

        // store user di nonaktif
        public function store_user_nonaktif($id)
        {
            $user_nonakif = User::find($id);

            if ($user_nonakif) {
                $user_nonakif->status = "nonaktif";
                $user_nonakif->save();

                return redirect()->route('daftar-user')->with('success', 'Data yang anda pilih berhasil di nonaktifkan');
            }
                return redirect()->route('daftar-user')->with('failed', 'Data yang anda pilih tidak tersedia');
        }

        // destroy user
        public function destroy_user($id)
        {
            $destroy_user = User::find($id);
            
            if ($destroy_user) {
                $destroy_user->delete();
                return redirect()->route('daftar-user')->with('destroy', 'Data yang anda pilih berhasil di hapus');
            } else{
                return redirect()->route('daftar-user')->with('failed', 'Data yang anda pilih gagal di hapus');
            }
        }

        // show user nonaktif
        public function show_user_nonaktif(Request $request)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            $search = $request->input('search');

            if ($search) {
                // Mengubah input pencarian menjadi lowercase
                $regex = strtolower($search);

                // Melakukan pencarian dengan menggunakan regex case-insensitive
                $get_user_nonaktif = User::where('user_status', 'user')->where('status', 'nonaktif')->where(function ($query) use ($regex) {
                    $query->whereRaw([
                            'nama_lengkap' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'nim' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jenis_kelamin' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jurusan' => ['$regex' => $regex, '$options' => 'i']
                        ]);
                    })
                    ->paginate(10);

                return view('admin.halaman_user.user_nonaktif', ['userNonaktif' => $get_user_nonaktif, 'count' => $count]);
            } else {
                // Tampilkan semua data jika tidak ada pencarian
                $get_user_nonaktif = User::where('user_status', 'user')->where('status', 'nonaktif')->paginate(10);
                return view('admin.halaman_user.user_nonaktif', ['userNonaktif' => $get_user_nonaktif, 'count' => $count]);
            }
        }

        // show user nonaktif detail
        public function show_user_nonaktif_detail($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();
            
            // show user nonaktif detail
            $userNonaktif_detail = User::find($id);
            return view('admin.halaman_user.user_detail_nonaktif', ['userDetail' => $userNonaktif_detail, 'count' => $count]);
        }

        // store aktifkan user
        public function store_user_aktif($id)
        {
            $user_akif = User::find($id);

            if ($user_akif) {
                $user_akif->status = "aktif";
                $user_akif->save();

                return redirect()->route('user-nonaktif')->with('success', 'Data yang anda pilih berhasil di aktifkan');
            }
                return redirect()->route('user-nonaktif')->with('failed', 'Data yang anda pilih tidak tersedia');
        }

        // destroy user nonaktif
        public function destroy_user_nonaktif($id)
        {
            $destroy_userNonaktif = User::find($id);
            
            if ($destroy_userNonaktif) {
                $destroy_userNonaktif->delete();
                return redirect()->route('user-nonaktif')->with('destroy', 'Data yang anda pilih berhasil di hapus');
            } else{
                return redirect()->route('user-nonaktif')->with('failed', 'Data yang anda pilih gagal di hapus');
            }
        }




    // Halaman Input NIM User
        // show menu daftar nim user
        public function show_daftar_nim(Request $request)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();
            
            $search = $request->input('search');

            if ($search) {
                // Mengubah input pencarian menjadi lowercase
                $regex = strtolower($search);

                // Melakukan pencarian dengan menggunakan regex case-insensitive
                $getNim = Nim::where(function ($query) use ($regex) {
                        $query->whereRaw([
                            'nim' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'kelas' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'angkatan' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'tingkatan' => ['$regex' => $regex, '$options' => 'i']
                        ])->orWhereRaw([
                            'jurusan' => ['$regex' => $regex, '$options' => 'i']
                        ]);
                    })
                    ->paginate(10);

                return view('admin.halaman_input_nim.daftar_nim', ['nimStore' => $getNim, 'count' => $count]);
            } else {
                // Tampilkan semua data jika tidak ada pencarian
                $getNim = Nim::paginate(10);
                return view('admin.halaman_input_nim.daftar_nim', ['nimStore' => $getNim, 'count' => $count]);
            }
        }

        // show menu edit nim user
        public function show_edit_nim($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();
            
            // show edit nim user
            $edit_nim = Nim::find($id);
            return view('admin.halaman_input_nim.edit_nim', ['editNim' => $edit_nim, 'count' => $count]);
        }

        // store edit nim user
        public function store_edit_nim(Request $request, $id)
        {
            $store_nim = Nim::find($id);
    
            if ($store_nim) {
                $store_nim->nim = $request->nim;
                $store_nim->kelas = $request->kelas;
                $store_nim->angkatan = $request->angkatan;
                $store_nim->tingkatan = $request->tingkatan;
                $store_nim->jurusan = $request->jurusan;

                $store_nim->save();

                return redirect()->route('daftar-nim-user')->with('success', 'Data yang anda inputkan berhasil di simpan');
            } else {
                return redirect()->route('daftar-nim-user')->with('failed', 'Data yang anda inginkan tidak tersedia');
            }
        }

        // hapus nim user
        public function destroy_nim($id)
        {
            $hapus_nim = Nim::find($id);
            
            if ($hapus_nim) {
                $hapus_nim->delete();
                return redirect()->route('daftar-nim-user')->with('destroy', 'Data yang anda pilih berhasil di hapus');
            } else{
                return redirect()->route('daftar-nim-user')->with('failed', 'Data yang anda pilih gagal di hapus');
            }
        }

        // show menu tambah nim user
        public function show_tambah_nim()
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            return view('admin.halaman_input_nim.tambah_nim', ['count' => $count]);
        }

        // store nim user
        public function store_nim_user(Request $request)
        {

            $input_nim = $request->nim;
            $database_nim = Nim::pluck('nim')->flatMap(function ($value) {
                $trimmedStr = trim($value);
                $replacedStr = str_replace(' ', '', $trimmedStr);
                return explode(',', $replacedStr);
            });

            if (in_array($input_nim, $database_nim->toArray())) {
                return redirect()->route('tambah-nim-user')->with('failed', 'Data gagal di tambahkan');
            }

            $request->validate([
                'nim' => ['required', 'unique:nim'],
            ]);

            Nim::create($request->all());
            return redirect()->route('tambah-nim-user')->with('success', 'Data berhasil di tambahkan');
        }




    // Halaman Informasi Menu
        // show info menu
        public function show_info_menu()
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            return view('admin.halaman_info_menu.info_menu', ['count' => $count]);
        }

}
