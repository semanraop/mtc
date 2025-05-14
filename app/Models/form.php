<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class form extends Model
{
    //

    // protected $table = 'mtcs';

    use HasFactory;

    protected $fillable = [
        'userid',
        'status',
        'serialno',
        'proof',
        'mouse',
        'cable',
        'bag',
        'adapter',
    ];

    // Relationship: A form belongs to one mtc
    public function show()
    {
        return $this->belongsTo(mtc::class, 'serialno');
    }

    public function scopeFilter($query, array $filters){
        if ($filters['search'] ?? false) {
            $query->where('userid', 'like', '%' . request('search') . '%')
                ->orWhere('status', 'like', '%' . request('search') . '%')
                ->orWhereHas('show', function ($query) {
                    $query->where('serialno', 'like', '%' . request('search') . '%');
                });
        }
    }
}
