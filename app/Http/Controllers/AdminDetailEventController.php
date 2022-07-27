<?php

namespace App\Http\Controllers;

use App\Models\Donate;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDetailEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $data = [
            "datadonasi" => DB::table('history_donate')->where('event_id', $id)->orderBy('id', 'DESC')->get(),
            'events' => DB::table('all_event')->where('id', $id)->take(1)->get(),
        ];
        return view('admin.detailEvent', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'donatur' => 'required',
            'jumlah' => 'required',
        ]);

        date_default_timezone_set('Asia/Ujung_Pandang');
        $tanggal = date('Y-m-d');
        $jam = date('H:i');

        $donatur = ucwords($request->donatur);

        $cek = DB::table('history_donate')->insert([
            'event_id' => $id,
            'donatur' => $donatur,
            'tanggal' => $tanggal,
            'jam' => $jam,
            'jumlah' => $request->jumlah,
        ]);

        if($cek) {
            return redirect()->route('detailEvent', $id)->with('success', 'Data Donasi Berhasil Ditambahkan!');
        } else {
            return redirect()->route('detailEvent', $id)->with('success', 'Data Donasi Gagal Ditambahkan!');
        }

//        $test = 'testttt';
//        $this->test($test);

    }

    public function test($test) {
        $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($event_id, $donate_id)
    {
//        dd($donate_id);
        $cek = Donate::where('id', $donate_id)->delete();

        if($cek) {
            return redirect()->route('detailEvent', $event_id)->with('success', 'Data Donasi Berhasil Dihapus!');
        } else {
            return redirect()->route('detailEvent', $event_id)->with('error', 'Data Donasi Gagal Dihapus!');

        }
    }
}
