<?php

namespace App\Models;

use App\Models\Blogs;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $table = 'blog_categories';

    public function blogs()
    {
        return $this->hasMany(Blogs::class, 'CategoryID');
    }
}
