<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mtcmodel extends Model
{
    //
    use HasFactory;

    protected $fillable = ['name'];

    // Relationship: One type can belong to many MTCs
    public function mtcs()
    {
        return $this->hasMany(Mtc::class);
    }
}
