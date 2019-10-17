<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
  
  protected $table = 'dev_bayar_m';
  protected $primaryKey = "no_bayar";
  protected $fillable = ['nim' , 'kode_lokasi' , 'tanggal' ,  'keterangan' , 'periode'];
  public $timestamps = false;

}
