<?php

namespace App\Http\Controllers;

use App\Models\laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
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
    public function store(Request $request)
    {
        if ($request['tahun']) {
            $menu = json_decode(file_get_contents('http://tes-web.landa.id/intermediate/menu'), true);
            $kategori = array_map(fn($e) => ['kategori' => ucfirst($e)], array_values(array_unique(array_map(fn($e) => $e['kategori'], $menu))));
            foreach ($menu as $valMenu) {
                foreach ($kategori as $k => $valKat) {
                    if (strtolower($valMenu['kategori']) == strtolower($valKat['kategori'])) {
                        $kategori[$k]['menu'][] = ['nama' => $valMenu['menu']];
                        break;
                    }
                }
            }

            $transaksi = json_decode(file_get_contents('http://tes-web.landa.id/intermediate/transaksi?tahun=' . $request['tahun']), true);
            $trx = array_map(fn($e) => array_merge($e, ['bulan' => (int) explode('-', $e['tanggal'])[1]]), $transaksi);

            $trxByMenu = [];
            $trxBulan = [];
            $total = 0;

            foreach ($trx as $value) {
                if (isset($trxByMenu[$value['menu']]['bulan'][$value['bulan']]['total'])) {
                    $trxByMenu[$value['menu']]['bulan'][$value['bulan']]['total'] += $value['total'];
                } else {
                    $trxByMenu[$value['menu']]['bulan'][$value['bulan']]['total'] = $value['total'];
                }

                if (isset($trxByMenu[$value['menu']]['total'])) {
                    $trxByMenu[$value['menu']]['total'] += $value['total'];
                } else {
                    $trxByMenu[$value['menu']]['total'] = $value['total'];
                }

                if (isset($trxBulan['data'][$value['bulan']]['total'])) {
                    $trxBulan['data'][$value['bulan']]['total'] += $value['total'];
                } else {
                    $trxBulan['data'][$value['bulan']]['total'] = $value['total'];
                }

                $total += $value['total'];
            }
            $trxBulan['total'] = $total;

            foreach ($kategori as $keyKat => $valKat) {
                foreach ($valKat['menu'] as $keyMenu => $valMenu) {
                    foreach ($trxByMenu as $keyTrx => $valTrx) {
                        if ($valMenu['nama'] == $keyTrx) {
                            $kategori[$keyKat]['menu'][$keyMenu]['bulan'] = $valTrx['bulan'];
                            $kategori[$keyKat]['menu'][$keyMenu]['total'] = $valTrx['total'];
                            break;
                        } else {
                            $kategori[$keyKat]['menu'][$keyMenu]['bulan'] = [];
                            $kategori[$keyKat]['menu'][$keyMenu]['total'] = 0;
                        }
                    }
                }
            }

            $data = [
                'kategori' => $kategori,
                'trxBulan' => $trxBulan,
                'tahun' => $request['tahun']
            ];
            // dd($data);
            return view('index', compact('data'));
        } else {
            return view('index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(laporan $laporan)
    {
        //
    }
}
