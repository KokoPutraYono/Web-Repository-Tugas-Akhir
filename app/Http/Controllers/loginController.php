<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\{
    User, Nim, PasswordReset
};

class loginController extends Controller
{
    // login
        // show login
        public function showLogin()
        {
            return view('login/login');
        }

        // store login
        public function storeLogin(Request $request)
        {
            $credentials = $request->validate([
                'email' => ['required', 'email:dns'],
                'password' => ['required'],
            ]);

            if (Auth::attempt($credentials, $request->remember)) {
                // $request->session()->regenerate();

                if ($request->remember) {
                    // Jika user memilih opsi "Remember Me", session disimpan untuk waktu yang lebih lama
                    $request->session()->regenerate(true);
                    $request->session()->put('remember_me', true);
                } else {
                    // Jika user tidak memilih opsi "Remember Me", session disimpan untuk waktu yang singkat
                    $request->session()->regenerate();
                    $request->session()->forget('remember_me');
                }

                // fungsi yang ingin diakses oleh admin atau super admin
                if(auth()->user()->user_status == 'admin' || auth()->user()->user_status == 'super admin') {
                    switch (auth()->user()->penanggung_jawab_jurusan) {
                        case "Alat Berat":
                        $request->session()->increment('Alat_Berat');
                        break;
                        case "Teknik Komputer":
                        $request->session()->increment('Teknik_Komputer');
                        break;
                        case "Teknik Mesin":
                        $request->session()->increment('Teknik_Mesin');
                        break;
                        case "Mekanik Otomotif":
                        $request->session()->increment('Mekanik_Otomotif');
                        break;
                        case "Akuntansi":
                        $request->session()->increment('Akuntansi');
                        break;
                        case "Teknik Elektronika":
                        $request->session()->increment('Teknik_Elektronika');
                        break;
                        case "Teknik Kimia":
                        $request->session()->increment('Teknik_Kimia');
                        break;
                        case "Rekam Medik dan Informasi Kesehatan":
                        $request->session()->increment('Rekam_Medik');
                        break;
                        case "Teknik Sipil":
                        $request->session()->increment('Teknik_Sipil');
                        break;
                        case "Teknik Informatika":
                        $request->session()->increment('Teknik_Informatika');
                        break;
                        case "Komputerisasi Akutansi":
                        $request->session()->increment('Komputerisasi_Akutansi');
                        break;
                        case "Mekanik Industri dan Desain":
                        $request->session()->increment('MID');
                        break;
                        case "Teknik Otomasi Industri":
                        $request->session()->increment('TOI');
                        break;
                        case "Mekatronik":
                        $request->session()->increment('Mekatronik');
                        break;
                        default:
                        // increment admin login count
                        $request->session()->increment('admin_login_count');
                    }
                    return redirect('/dassboard-admin');
                    
                } elseif (auth()->user()->user_status == 'user') {
                    if (auth()->user()->status == 'aktif') {
                        switch (auth()->user()->jurusan) {
                            case "Alat Berat":
                            $request->session()->increment('jurusan_jurusan_Alat_Berat');
                            break;
                            case "Teknik Komputer":
                            $request->session()->increment('jurusan_Teknik_Komputer');
                            break;
                            case "Teknik Mesin":
                            $request->session()->increment('jurusan_Teknik_Mesin');
                            break;
                            case "Mekanik Otomotif":
                            $request->session()->increment('jurusan_Mekanik_Otomotif');
                            break;
                            case "Akuntansi":
                            $request->session()->increment('jurusan_Akuntansi');
                            break;
                            case "Teknik Elektronika":
                            $request->session()->increment('jurusan_Teknik_Elektronika');
                            break;
                            case "Teknik Kimia":
                            $request->session()->increment('jurusan_Teknik_Kimia');
                            break;
                            case "Rekam Medik dan Informasi Kesehatan":
                            $request->session()->increment('jurusan_Rekam_Medik');
                            break;
                            case "Teknik Sipil":
                            $request->session()->increment('jurusan_Teknik_Sipil');
                            break;
                            case "Teknik Informatika":
                            $request->session()->increment('jurusan_Teknik_Informatika');
                            break;
                            case "Komputerisasi Akutansi":
                            $request->session()->increment('jurusan_Komputerisasi_Akutansi');
                            break;
                            case "Mekanik Industri dan Desain":
                            $request->session()->increment('jurusan_MID');
                            break;
                            case "Teknik Otomasi Industri":
                            $request->session()->increment('jurusan_TOI');
                            break;
                            default:
                            // increment admin login count
                            $request->session()->increment('jurusan_Mekatronik');
                        }
                        // increment user login count
                        $request->session()->increment('user_login_count');
                        return redirect('/beranda'); // redirect ke halaman home jika bukan admin atau super admin
                    }else {
                        Auth::logout();
                        $request->session()->invalidate();
                        $request->session()->regenerateToken();
                    
                        return back()->with('failed', 'Akun anda di nonaktifkan oleh admin, Hubungi pihak terkait untuk mengaktifkannya');
                    }
                    
                }
                
            }
    
            return back()->with('failed', 'Login gagal, Periksa kembali Email dan Password anda!');
        }

        // logout
        public function logout(Request $request)
        {
            Auth::logout();
        
            $request->session()->invalidate();
        
            $request->session()->regenerateToken();
        
            return redirect('/');
        }
    
    // lupa password
        // show lupa password
        public function lupaPassword()
        {
            return view('login/lupaPassword');
        }

        // send to email
        public function sendResetLinkEmail(Request $request)
        {
            $validatedData = $request->validate([
                'email' => ['required', 'email:dns'],
                'nim' => ['required'],
            ]);

            $input_nim = $validatedData['nim'];
            $kolom_nim = Nim::pluck('nim')->flatMap(function ($value) {
                $trimmedStr = trim($value);
                $replacedStr = str_replace(' ', '', $trimmedStr);
                return explode(',', $replacedStr);
            });

            $user = User::where('email', $request->email)->first();

            if ($user && in_array($input_nim, $kolom_nim->toArray())) {

                $token = Str::random(60);
                PasswordReset::create([
                    'email' => $user->email,
                    'user_id' => $user->_id,
                    'token' => $token,
                ]);

                $user->notify(new ResetPasswordNotification($token));
                return back()->with('success', 'Link reset password telah dikirim ke email Anda');

            }else{
                return back()->with('failed', 'Data yang di inputkan tidak terdaftar');
            }
        }

        public function resetPassword(Request $request)
        {
            return view('login/resetPassword', ['token' => $request->query('token')]);
        }

        public function updatePassword(Request $request)
        {
            $request->validate([
                'token' => 'required',
                'email' => ['required', 'email:dns'],
                'password' => ['required', 'min:8', 'max:255', 'confirmed'],
            ]);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->with('failed', 'Email tidak terdaftar');
            }

            $passwordReset = PasswordReset::where('token', $request->token)->first();

            if (!$passwordReset) {
                return back()->with('failed', 'Token reset password tidak valid');
            }

            if (Carbon::parse($passwordReset->created_at)->addMinutes(60)->isPast()) {
                $passwordReset->delete();
                return back()->with('failed', 'Token reset password telah kadaluarsa');
            }

            $user->update(['password' => bcrypt($request->password)]);
            $passwordReset->delete();

            return redirect()->route('login')->with('success', 'Password berhasil direset');
        }


    // register
        // show register
        public function showRegister()
        {
            return view('login/register');
        }
        // register store
        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'nama_lengkap' => ['required', 'min:3', 'max:50'],
                'nim' => ['required', 'unique:users'],
                'email' => ['required', 'unique:users', 'email:dns'],
                'jenis_kelamin' => 'required',
                'nomor_hp' => ['required', 'unique:users'],
                'jurusan' => 'required',
                'tingkatan' => 'required',
                'angkatan' => ['required', 'min:4', 'max:4'],
                'password' => ['required', 'min:8', 'max:255', 'confirmed'],
            ]);

            $validatedData['status'] = "aktif";
            $validatedData['user_status'] = "user";
            
            $input_nim = $validatedData['nim'];
            $kolom_nim = Nim::pluck('nim')->flatMap(function ($value) {
                $trimmedStr = trim($value);
                $replacedStr = str_replace(' ', '', $trimmedStr);
                return explode(',', $replacedStr);
            });

            $validatedData['image'] = new \MongoDB\BSON\Binary('', \MongoDB\BSON\Binary::TYPE_GENERIC);

            $validatedData['password'] = bcrypt($validatedData['password']);

            if (in_array($input_nim, $kolom_nim->toArray())) {
                $user = User::create($validatedData);
                return redirect()->route('login')->with('success', 'Registrasi Berhasil, sekarang anda sudah bisa login');
            }

            return redirect()->route('register')->with('failed', 'Registrasi gagal, periksa kembali data yang anda inputkan atau hubungi admin');

        }
    
    // menampilkan image profil
    public function showImage_profile($id)
    {
        $user = User::findOrFail($id);
        return response()->streamDownload(function () use ($user) {
            echo $user->image->getData();
        }, 'profile-image.jpg');

    }
}
