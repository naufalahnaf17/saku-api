<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagihanDetail extends Model
{
  protected $table = "dev_tagihan_d";
  public $timestamps = false;

  protected $fillable = ['no_tagihan' , 'kode_lokasi' ,  'kode_jenis' ,'nilai'];
}
