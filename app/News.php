<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = "m_news";
    protected $fillable = ["title", "body"];
    protected $hidden = ["is_active", "created_at", "updated_at"];
}
