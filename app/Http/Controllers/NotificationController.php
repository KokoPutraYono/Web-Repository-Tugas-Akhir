<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Notification
};
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // show notifikasi
    public function show_notifikasi()
    {
        $notifikasi_TA = Notification::where('user_id', auth()->user()->_id)->get();
        $get_count = Notification::where('user_id', auth()->user()->_id)->where('is_read', 'unread')->get();
        if ($get_count->count() > 0) {
            $count =$get_count->count();
        }else{
            $count = null;
        }

        return view('admin.notifikasi.notifikasi', ['notifikasi' => $notifikasi_TA, 'count' => $count]);
    }

    // read notifikasi
    public function read_notifikasi($id)
    {
        $read = Notification::find($id);
        $read->is_read = "read";
        $read->save();

        return redirect()->route('notifikasi');
    }

    // destroy notifikasi
    public function destroy_notifikasi($id)
    {
        $destroy = Notification::find($id);
        $destroy->delete();
        
        return redirect()->route('notifikasi');
    }
}
