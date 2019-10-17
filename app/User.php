<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = "dev_admin";
    protected $primaryKey = "id";
    public $timestamps = false;
    protected $fillable = ['username' ,  'password'];

}
