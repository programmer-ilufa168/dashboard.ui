<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Developer extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_developer';

    protected $fillable = [
        'developer_name',
        'email',
        'image_developer','status'
    ];

}
