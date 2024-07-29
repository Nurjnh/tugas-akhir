<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class AsetUnit extends Model
{
    use HasFactory;
    protected $table = 'aset_unit';
    protected $primaryKey = 'aset_unit_id';
    protected $with =['bidang'];

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

    public function getIncrementing(){
        return false;
    }

    public function getKeyType(){
        return 'string';
    }

    function bidang(){
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

     function detail(){
        return $this->belongsTo(AsetDetail::class, 'aset_id');
    }

}
