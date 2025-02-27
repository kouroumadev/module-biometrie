<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BioDone extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function biometrie()
    {
        return $this->belongsTo(Biometrie::class, 'biometrie_id');
    }
}
