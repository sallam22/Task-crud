<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class depart extends Model
{
    protected $fillable = [
        'name',
        'depart_id',
        
        
    ];
    
    public function ds(){

return $this->hasMany(self::class,'depart_id');
    }
    public function us(){

        return $this->belongsTo(self::class,'id','depart_id');
            }
}
