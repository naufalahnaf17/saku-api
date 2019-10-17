<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{

  protected $table = "dev_tagihan_m";
  protected $primaryKey = "no_tagihan";
  public $timestamps = false;
  protected $fillable = ['nim' , 'kode_lokasi' ,  'tanggal' , 'keterangan' , 'periode'];

}
