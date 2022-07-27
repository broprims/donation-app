<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('admin.dashboard');
    }

    public function eventTable()
    {
        $data = [
            'data_event' => Event::orderBy('id', 'DESC')->get(),
            'cek_event' => Event::orderBy('id', 'DESC')->take(1)->first()
        ];
        return view('admin.event', $data);
    }



    public function eventReport($id)
    {
//        dd($id);
        $data = [
            "datadonasi" => DB::table('history_donate')->where('event_id', $id)->orderBy('id', 'DESC')->get(),
            'events' => DB::table('all_event')->where('id', $id)->take(1)->get(),
        ];
        return view('report.eventReport', $data);
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


    public function finishEvent($id)
    {
//        dd($id);
        $status = "done";

        $cek = DB::table('all_event')->where('id', $id)->update([
            'status' => $status,
        ]);

        if($cek) {
            return redirect()->route('tableEvent')->with('success', 'Event Berhasil Diselesaikan!');
        } else {
            return redirect()->route('tableEvent')->with('success', 'Event Gagal Diselesaikan!');
        }
    }


    public function store(Request $request)
    {

//        dd($request->tgl);
        $request->validate([
            'event' => 'required',
            'donate_target' => 'required',
            'event_date' => 'required',
        ]);

        date_default_timezone_set('Asia/Ujung_Pandang');
        $year = date('Y');
        $desc = "donasi";
        $status = "started";

        $event = ucwords($request->event);

        $cek = DB::table('all_event')->insert([
            'event' => $event,
            'year' => $year,
            'donate_target' => $request->donate_target,
            'desc' => $desc,
            'status' => $status,
            'event_date' => $request->event_date,
        ]);

        if($cek) {
            return redirect()->route('tableEvent')->with('success', 'Data Event Berhasil Ditambahkan!');
        } else {
            return redirect()->route('tableEvent')->with('success', 'Data Event Gagal Ditambahkan!');
        }

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
//        dd($id);

        $event = ucwords($request->event);

        $cek = DB::table('all_event')->where('id', $id)->update([
            'event' => $event,
            'donate_target' => $request->donate_target,
            'event_date' => $request->event_date,
        ]);

        if($cek) {
            return redirect()->route('tableEvent')->with('success', 'Data Event Berhasil Diubah!');
        } else {
            return redirect()->route('tableEvent')->with('success', 'Data Event Gagal Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd($id);
        $cek = Event::where('id', $id)->delete();

        if($cek) {
            return redirect()->route('tableEvent')->with('success', 'Data Event Berhasil Dihapus!');
        } else {
            return redirect()->route('tableEvent')->with('error', 'Data Event Gagal Dihapus!');

        }
    }
}
