<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tagihan;

class TagihanController extends Controller
{

    public function index()
    {

      $data = Tagihan::all();
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

    public function search($keyword)
    {

      $data = Tagihan::where('no_tagihan' , 'like' , '%' .$keyword. '%')->orWhere('nim' , 'like' , '%' .$keyword. '%')->get();
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

    public function edit($no_tagihan , Request $request)
    {
        $nim = $request->input('nim');
        $kode_lokasi = "";
        $tanggal = $request->input('tanggal');
        $keterangan = $request->input('keterangan');
        $periode = $request->input('periode');

        $data = Tagihan::find($no_tagihan);
        $data->nim = $nim;
        $data->kode_lokasi = $kode_lokasi;
        $data->tanggal = $tanggal;
        $data->keterangan = $keterangan;
        $data->periode = $periode;

        if ($data->save()) {
          $res['status'] = "200";
          $res['message'] = "Success Mengubah Data";
          return response($res);
        }else {
          $res['status'] = "400";
          $res['message'] = "Something Wrong";
          return response($res);
        }

    }

    public function delete($no_tagihan)
    {

      $data = Tagihan::find($no_tagihan);
      if ($data->delete()) {
        $res['status'] = "200";
        $res['message'] = "Success Delete Tagihan";
        return response($res);
      }else {
        $res['status'] = "400";
        $res['message'] = "Something Wrong , Please Check no_tagihan";
        return response($res);
      }

    }

}
