<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class mtc extends Model
{
    //
    // Explicitly set the table name
    protected $table = 'mtcs';

    use HasFactory;

    protected $fillable = [
        'serialno',
        'mac',
        'model',
        'tagging',
        'status',
        'user',
        'seatid',
    ];

    public function scopeFilter($query, array $filters){
        if ($filters['search']?? false){
            $query->where('serialno','like', '%'.request('search').'%')
            ->orWhere('mac','like', '%'.request('search').'%')
            ->orWhere('model','like', '%'.request('search').'%')
            ->orWhere('status','like', '%'.request('search').'%');
        }
    }



    // Relationship: An MTC belongs to one Type
    public function type()
    {
        return $this->belongsTo(Mtcmodel::class, 'model');
    }

    //relationship an  mtc belongs to one seat
    public function seat()
    {
        return $this->belongsTo(location::class, 'seatid');
    }
}
