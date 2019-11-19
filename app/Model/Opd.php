<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    protected $table = 'opd';
    public $timestamps = false;

    public function tabelOpd()
    {
        return $this->hasMany("App\Model\JenisTabel", "id_opd");
    }

    // public function getuser()
    // {
    //     return $this->hasOne(User::class, 'id_opd');
    // }
}
