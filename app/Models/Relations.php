<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relations extends Model
{
    use HasFactory;
    protected $fillable = [
        'parent_id',
        'child_id',
    ];
    public function parent()
    {
        return $this->belongsTo(People::class, 'parent_id');
    }
    public function child()
    {
        return $this->belongsTo(People::class, 'child_id');
    }
    
}
