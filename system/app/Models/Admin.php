<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';

    public function bidang()    {
        return $this->belongsTo(Bidang::class, 'akun_bidang_id');
    }

    function handleUploadFoto(){
        if(request()->hasFile('foto')){
            $this->handleDeleteFoto();
            $foto = request()->file('foto');
            $destination = "profil";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/".$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $foto= $this->foto;
        if($foto){
            $path = public_path($foto);
        if(file_exists($path)){
            unlink($path);

        }
    return true;
        }
    }
}
