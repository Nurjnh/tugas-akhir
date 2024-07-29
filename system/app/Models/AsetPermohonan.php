<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class AsetPermohonan extends Model
{
    use HasFactory;
    protected $table = 'aset_permohonan';
    protected $primaryKey = 'aset_permohonan_id';

     function bidang(){
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

     function author(){
        return $this->belongsTo(Admin::class, 'author_id');
    }

}
