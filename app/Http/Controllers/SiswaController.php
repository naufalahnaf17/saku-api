<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;

class SiswaController extends Controller
{

    public function index()
    {
        $data = Siswa::all();

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

      $data = Siswa::where('nama' , 'like' , '%' .$keyword. '%')->orWhere('nim' , 'like' , '%' .$keyword. '%')->get();
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
      $nama = $request->input('nama');
      $kode_jur = $request->input('kode_jur');

      $data = new Siswa;
      $data->nim = $nim;
      $data->kode_lokasi = $kode_lokasi;
      $data->nama = $nama;
      $data->kode_jur = $kode_jur;

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

      $nim = $request->input('nim');
      $kode_lokasi = "";
      $nama = $request->input('nama');
      $kode_jur = $request->input('kode_jur');

      $data = Siswa::find($nim);
      $data->nim = $nim;
      $data->kode_lokasi = $kode_lokasi;
      $data->nama = $nama;
      $data->kode_jur = $kode_jur;

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

    public function delete($nim)
    {

      $data = Siswa::find($nim);
      if($data->delete()){
        $res['status'] = "200";
        $res['message'] = "Success!";
        return response($res);
      }
      else{
          $res['status'] = "200";
          $res['message'] = "Failed!";
          return response($res);
      }

    }

}
