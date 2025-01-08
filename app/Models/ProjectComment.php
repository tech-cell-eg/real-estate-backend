<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'writer_id',
        'writer_type',
        'comment'
    ];

}
