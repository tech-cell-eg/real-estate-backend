<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectNote extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'note'];

    public function project()
    {
        return $this->belongsTo(Order::class);
    }
}
