<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteRating extends Model
{
    protected $fillable=["name","surname","comment"];
    use HasFactory;
}
