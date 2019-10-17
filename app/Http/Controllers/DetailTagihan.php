<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TagihanDetail;
use Illuminate\Support\Facades\DB;

class DetailTagihan extends Controller
{

    public function index($no_tagihan)
    {

      $data = TagihanDetail::where('no_tagihan' , $no_tagihan)->get();
      if (count($data) > 0) {
        $res['status'] = "200";
        $res['message'] = "Success Mengambil Data";
        $res['value'] = $data;
        return response($res);
      }else {
        $res['status'] = "400";
        $res['message'] = "Something Wrong With Your No Tagihan";
        return response($res);
      }

    }

    public function tambah($no_tagihan , Request $request)
    {
      $kode_lokasi = "";
      $kode_jenis = $request->input('kode_jenis');
      $nilai = $request->input('nilai');

      $data = new TagihanDetail;
      $data->no_tagihan = $no_tagihan;
      $data->kode_lokasi = $kode_lokasi;
      $data->kode_jenis = $kode_jenis;
      $data->nilai = $nilai;

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

    public function edit($no_tagihan , $nilai , Request $request)
    {

      $data = DB::table('dev_tagihan_d')
              ->where('no_tagihan', '=', $no_tagihan)
              ->where('nilai' , '=' , $nilai)
              ->update([
                'kode_jenis' => $request->kode_jenis,
                'nilai' => $request->nilai
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

    public function delete($no_tagihan , $nilai){

      $data = DB::table('dev_tagihan_d')
              ->where('no_tagihan', '=', $no_tagihan)
              ->where('nilai' , '=' , $nilai)
              ->delete();

      if ($data) {
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
