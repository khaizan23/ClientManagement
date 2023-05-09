<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contact()
    {
        return $this->hasOne(\App\Models\ClientContact::class);
    }
    

    public function getPrettyCreatedAttribute()
    {
        return date('F d, Y', strtotime($this->created_at));
    }
}
