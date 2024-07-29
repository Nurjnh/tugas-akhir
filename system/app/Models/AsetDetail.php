<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class AsetDetail extends Model
{
    use HasFactory;
    protected $table = 'aset_detail';
    protected $primaryKey = 'aset_detail_id';

    function handleUploadFoto(){
        if(request()->hasFile('aset_foto')){
            $this->handleDeleteFoto();
            $foto = request()->file('aset_foto');
            $destination = "aset";
            $randomStr = Str::random(5);
            $filename = time()."-".$randomStr.".".$foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->aset_foto = "images/".$url;
            $this->save;
        }
    }
    function handleDeleteFoto(){
        $foto= $this->aset_foto;
        if($foto){
            $path = public_path($foto);
        if(file_exists($path)){
            unlink($path);

        }
    return true;
        }
    }

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    // biar tidak auto increment
    public function getIncrementing(){
        return false;
    }

    // mendevinisikan sebagai string
    public function getKeyType(){
        return 'string';
    }

     function kategori(){
        return $this->belongsTo(KategoriAset::class, 'aset_kategori_id');
    }

     function aset(){
        return $this->belongsTo(Aset::class, 'aset_id');
    }
}
