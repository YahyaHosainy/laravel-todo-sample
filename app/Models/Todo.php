<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $table = 'todos';

    protected $primaryKey = 'id';

    public function isMarked()
    {
        if ($this->markeds()->count() > 0) {
            return true;
        }
        return false;
    }

    public function markeds()
    {
        return $this->hasMany(Marked::class, 'for_', 'id');
    }
}
