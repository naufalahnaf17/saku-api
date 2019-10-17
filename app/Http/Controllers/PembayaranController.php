<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{

    public function index()
    {

      $data = Pembayaran::all();
      if (count($data) > 0) {
        $res['status'] = "200";
        $res['message'] = "Success Mengambil Data";
        $res['value'] = $data;
        return response($res);
      }else {
        $res['status'] = "400";
        $res['message'] = "Something Wrong";
        return response($res);
      }

    }

    public function tambah(Request $request)
    {
      $nim = $request->input('nim');
      $kode_lokasi = "";
      $tanggal = $request->input('tanggal');
      $keterangan = $request->input('keterangan');
      $periode = "2019/11";

      $data = new Pembayaran;
      $data->nim = $nim;
      $data->kode_lokasi = $kode_lokasi;
      $data->tanggal = $tanggal;
      $data->keterangan = $keterangan;
      $data->periode = $periode;

      if ($data->save()) {
        $res['status'] = "200";
        $res['message'] = "Success Menyimpan Data";
        return response($res);
      }else {
        $res['status'] = "400";
        $res['message'] = "Gagal Menyimpan Data";
        return response($res);
      }

    }

    public function edit($nim , Request $request)
    {
      $nim_baru = $request->input('nim');
      $kode_lokasi = "";
      $tanggal = $request->input('tanggal');
      $keterangan = $request->input('keterangan');
      $periode = "2019/11";

      $data = DB::table('dev_bayar_m')
              ->where('nim', '=', $nim)
              ->update([
                'nim' => $nim_baru,
                'tanggal' => $tanggal,
                'keterangan' => $keterangan
              ]);

      if ($data) {
        $res['status'] = "200";
        $res['message'] = "Success Mengubah Data";
        return response($res);
      }else {
        $res['status'] = "400";
        $res['message'] = "Something Wrong";
        return response($res);
      }

    }

    public function delete($nim)
    {

      $data = DB::table('dev_bayar_m')
              ->where('nim', '=', $nim)
              ->delete();

      if($data){
        $res['status'] = "200";
        $res['message'] = "Success!";
        return response($res);
      }
      else{
          $res['status'] = "400";
          $res['message'] = "Failed!";
          return response($res);
      }

    }

}
