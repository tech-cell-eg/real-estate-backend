<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectComment extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'comment'];

    public function project()
    {
        return $this->belongsTo(Order::class);
    }
}
