<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marked extends Model
{
    protected $table = 'marked';

    use HasFactory;

    public function todo()
    {
        return $this->belongsTo(Todo::class,'id','for_');
    }
}
