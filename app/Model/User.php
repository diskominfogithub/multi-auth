<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table = "public.user";

    public function getopd()
    {
        return $this->belongsTo(Opd::class, 'id_opd');
    }
}
