<?php

namespace Mrshiam\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Mrshiam\Blog\Contracts\Blog as BlogContract;

class Blog extends Model implements BlogContract
{
    protected $fillable = [
        'writer_name',
        'blog_title',
        'details',
        'image',
    ];
}