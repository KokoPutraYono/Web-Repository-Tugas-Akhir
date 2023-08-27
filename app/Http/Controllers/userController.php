<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\{
    Tugas_Akhir, Pengaturan_TA, User, Notification
};
use MongoDB\BSON\Binary;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    // Beranda
        // show beranda
        public function show_beranda(Request $request)
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
                return view('user.beranda.beranda', ['showTA' => $get_TA, 'count' => $count]);
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

            return view('user.beranda.beranda', ['showTA' => $filteredData, 'count' => $count]);


        }
        // show beranda detail
        public function show_beranda_detail($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            // show beranda detail
            $filter = Pengaturan_TA::get()->first();
            $get_detail = Tugas_Akhir::find($id);
            $get_file = Tugas_Akhir::select('file_TA')->find($id);

            $bab1 = ($filter->bab1 == "public") ? $get_detail->file_TA['bab1'] : null;
            $bab2 = ($filter->bab2 == "public") ? $get_detail->file_TA['bab2'] : null;
            $bab3 = ($filter->bab3 == "public") ? $get_detail->file_TA['bab3'] : null;
            $bab4 = ($filter->bab4 == "public") ? $get_detail->file_TA['bab4'] : null;
            $bab5 = ($filter->bab5 == "public") ? $get_detail->file_TA['bab5'] : null;

            return view('user.beranda.beranda_detail', [
                'showDetail' => $get_detail,
                'bab1' => $bab1,
                'bab2' => $bab2,
                'bab3' => $bab3,
                'bab4' => $bab4,
                'bab5' => $bab5,
                'count' => $count
            ]);
        }
        // show file tugas akhir
        public function show_beranda_file($nama_file, $id)
        {
            $get_file = Tugas_Akhir::find($id);
            $file = $get_file->file_TA[$nama_file];

            $stream = Storage::disk('local')->readStream($file['path']);

            return response()->stream(function() use ($stream) { fpassthru($stream); }, 200, [
                'Content-Type' => $file['mime'],
                'Content-Disposition' => 'inline; filename="'.$file['original_filename'].'"'
            ]);
        }


    // Menu Input Tugas Akhir
        // show menu input tugas akhir
        public function show_menu_input_TA()
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            return view('user.menu_input_TA.input_TA', ['count' => $count]);
        }
        // store tugas akhir
        public function store_TA(Request $request){
            
            $validatedData = $request->validate([
                'judul'=> 'required',
                'abstrak'=> 'required',
                'kata_kunci'=> 'required',
                'dospem'=> 'required',
                'penguji_1'=> 'required',
                'penguji_2'=> 'required',
                'kaprodi'=> 'required',

                'nama'=> 'required',
                'nim'=> 'required',
                'kelas'=> 'required',
                'angkatan'=> 'required',
                'tingkatan'=> 'required',
                'jurusan'=> 'required',

                'file_bab1'=> 'required',
                'file_bab2'=> 'required',
                'file_bab3'=> 'required',
                'file_bab4'=> 'required',
                'file_bab5'=> 'required',
            ]);

            $user = new Tugas_Akhir();

            $user->judul = $validatedData['judul'];
            $user->abstrak = $validatedData['abstrak'];
            $user->kata_kunci = $validatedData['kata_kunci'];
            $user->dospem = $validatedData['dospem'];
            $user->penguji_1 = $validatedData['penguji_1'];
            $user->penguji_2 = $validatedData['penguji_2'];
            $user->kaprodi = $validatedData['kaprodi'];

            $user->nama = $validatedData['nama'];
            $user->nim = $validatedData['nim'];
            $user->kelas = $validatedData['kelas'];
            $user->angkatan = $validatedData['angkatan'];
            $user->tingkatan = $validatedData['tingkatan'];
            $user->jurusan = $validatedData['jurusan'];
            $user->status = 'menunggu';
            $user->user_id = auth()->user()->_id;

            if ($request->hasFile('file_program')) {
                $file_program = [
                    'filename' => $request->file_program->getClientOriginalName(),
                    'mime' => $request->file_program->getClientMimeType(),
                    'original_filename' => $request->file_program->getClientOriginalName(),
                    'path' => $request->file_program->store('files'),
                    'data' => new Binary(file_get_contents($request->file_program), Binary::TYPE_GENERIC),
                ];
            } else {
                $file_program = null;
            }

            if ($request->link_video) {
                $link_video = $request->link_video;
            } else {
                $link_video = null;
            }

            $user->file_TA = [
                'bab1' => [
                    'filename' => $request->file_bab1->getClientOriginalName(),
                    'mime' => $request->file_bab1->getClientMimeType(),
                    'original_filename' => $request->file_bab1->getClientOriginalName(),
                    'path' => $request->file_bab1->store('files'),
                    'data' => new Binary(file_get_contents($request->file_bab1), Binary::TYPE_GENERIC),
                ],
                'bab2' => [
                    'filename' => $request->file_bab2->getClientOriginalName(),
                    'mime' => $request->file_bab2->getClientMimeType(),
                    'original_filename' => $request->file_bab2->getClientOriginalName(),
                    'path' => $request->file_bab2->store('files'),
                    'data' => new Binary(file_get_contents($request->file_bab2), Binary::TYPE_GENERIC),
                ],
                'bab3' => [
                    'filename' => $request->file_bab3->getClientOriginalName(),
                    'mime' => $request->file_bab3->getClientMimeType(),
                    'original_filename' => $request->file_bab3->getClientOriginalName(),
                    'path' => $request->file_bab3->store('files'),
                    'data' => new Binary(file_get_contents($request->file_bab3), Binary::TYPE_GENERIC),
                ],
                'bab4' => [
                    'filename' => $request->file_bab4->getClientOriginalName(),
                    'mime' => $request->file_bab4->getClientMimeType(),
                    'original_filename' => $request->file_bab4->getClientOriginalName(),
                    'path' => $request->file_bab4->store('files'),
                    'data' => new Binary(file_get_contents($request->file_bab4), Binary::TYPE_GENERIC),
                ],
                'bab5' => [
                    'filename' => $request->file_bab5->getClientOriginalName(),
                    'mime' => $request->file_bab5->getClientMimeType(),
                    'original_filename' => $request->file_bab5->getClientOriginalName(),
                    'path' => $request->file_bab5->store('files'),
                    'data' => new Binary(file_get_contents($request->file_bab5), Binary::TYPE_GENERIC),
                ],

                'file_program' => $file_program,

                'link_video' => $link_video
            ];

            // mengirimkan notifikasi ke database notifikasi
            // kirim ke database notifikasi (notifikasi ke penanggung jawab semua jurusan)
            $semua_jurusan = User::where('penanggung_jawab_jurusan', "Semua Jurusan")->get();
            foreach ($semua_jurusan as $jurusan) {
                $notifikasi = Notification::create([
                    'title' => strtoupper($user->judul) . " menunggu di acc",
                    'message' => "Ada Tugas Akhir baru nih yang harus di ACC. Tugas Akhir yang berjudul " . $user->judul . " dengan Nama " . $user->nama . " dan Nim " . $user->nim . " dan dari Jurusan " . $user->jurusan . " sedang menunggu untuk di ACC.",
                    'user_id' => $jurusan->_id,
                    'is_read' => "unread",
                ]);
            }
            
            // kirim ke database notifikasi (notifikasi ke admin penanggung jawab jurusan)
            $jurusan_tertentu = User::where('penanggung_jawab_jurusan', $user->jurusan)->get();
            foreach ($jurusan_tertentu as $jurusan) {
                $notifikasi = Notification::create([
                    'title' => strtoupper($user->judul) . " menunggu di acc",
                    'message' => "Ada Tugas Akhir baru nih yang harus di ACC. Tugas Akhir yang berjudul " . $user->judul . " dengan Nama " . $user->nama . " dan Nim " . $user->nim . " dan dari Jurusan " . $user->jurusan . " sedang menunggu untuk di ACC.",
                    'user_id' => $jurusan->_id,
                    'is_read' => "unread",
                ]);
            }

            $user->save();
            return redirect()->route('input-tugas-akhir')->with('success', 'Data yang anda inputkan berhasil di simpan');
        }


    // menu pengaturan akun
        // show menu pengaturan akun
        public function show_pengaturan_akun()
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();

            return view('user.pengaturan_akun.pengaturan_akun', ['count' => $count]);
        }

        // show menu edit pengaturan akun
        public function show_edit_pengaturan_akun($id)
        {
            // notifikasi 
            $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
            $count = $notifikasi_TA->count();
            
            // show edit pengaturan akun
            $edit = User::find($id);
            return view('user.pengaturan_akun.edit_pengaturan_akun', ['editAkun' => $edit, 'count' => $count]);
        }

        // store data edit pengaturan akun
        public function store_data_pengaturan_akun(Request $request, $id)
        {
            $user = User::find($id);


            if ($user->user_status == 'user') {
                if ($request->password) {
                    $validatedData = $request->validate([
                        'nama_lengkap'=> 'required',
                        'profile_image'=> 'file|mimes:jpg,png',
                        'jenis_kelamin' => 'required',
                        'nomor_hp' => 'required',
                        'angkatan'=> 'required',
                        'tingkatan'=> 'required',
                        'jurusan'=> 'required',
                        'password' => ['min:8', 'max:255', 'confirmed'],
                    ]);
                }else{
                    $validatedData = $request->validate([
                        'nama_lengkap'=> 'required',
                        'profile_image'=> 'file|mimes:jpg,png',
                        'jenis_kelamin' => 'required',
                        'nomor_hp' => 'required',
                        'angkatan'=> 'required',
                        'tingkatan'=> 'required',
                        'jurusan'=> 'required',
                    ]);
                }
                

                $user->nama_lengkap = $request->nama_lengkap;

                if ($request->password) {
                    $user->password = bcrypt($validatedData['password']);
                }

                if($request->profile_image != null){
                    $user->image = $request->file('profile_image')->get();
                }

                $user->jenis_kelamin = $request->jenis_kelamin;
                $user->nomor_hp = $request->nomor_hp;
                $user->angkatan = $request->angkatan;
                $user->tingkatan = $request->tingkatan;
                $user->jurusan = $request->jurusan;
                $user->save();

                return redirect()->route('pengaturan-akun')->with('success', 'Data yang anda inputkan berhasil di update');
            
            }else{
                $image = new User;
                if ($request->password) {
                    $validatedData = $request->validate([
                    'nama_lengkap'=> 'required',
                    'profile_image'=> 'file|mimes:jpg,png',
                    'jenis_kelamin' => 'required',
                    'nomor_hp' => 'required',
                    'nip'=> 'required',
                    'jabatan' => 'required',
                    'password' => ['min:8', 'max:255', 'confirmed'],
                ]);
                }else{
                    $validatedData = $request->validate([
                    'nama_lengkap'=> 'required',
                    'profile_image'=> 'file|mimes:jpg,png',
                    'jenis_kelamin' => 'required',
                    'nomor_hp' => 'required',
                    'nip'=> 'required',
                    'jabatan' => 'required',
                ]);
                }

                $user->nama_lengkap = $request->nama_lengkap;

                if($request->profile_image != null){
                    $user->image = $request->file('profile_image')->get();
                }

                if ($request->password) {
                    $user->password = bcrypt($validatedData['password']);
                }

                $user->jenis_kelamin = $request->jenis_kelamin;
                $user->nomor_hp = $request->nomor_hp;
                $user->nip = $request->nip;
                $user->jabatan = $request->jabatan;
                $user->save();

                return redirect()->route('pengaturan-akun')->with('success', 'Data yang anda inputkan berhasil di update');
            }
            
            return redirect()->route('pengaturan-akun')->with('failed', 'Data yang anda inputkan gagal di update');
        }
}
