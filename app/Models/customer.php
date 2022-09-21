<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama','alamat','kelamin','no_telp','email_customer','user_id'
    ];

    public function transaksi()
    {
      return $this->hasMany(transaksi::class, 'customer_id','id');
    }

    public function users()
    {
      return $this->belongsTo(User::class,'user_id','id');
    }
}
