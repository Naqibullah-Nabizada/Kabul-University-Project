<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Researcher extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }

    public function oldPosition(){
        return $this->belongsTo(Position::class, 'old_position_id');
    }

    public function newPosition(){
        return $this->belongsTo(Position::class, 'new_position_id');
    }


    public function department(){
        return $this->belongsTo(Department::class);
    }
}
