<?php

namespace App\Models;

use App\Models\BlogTags;
use App\Models\BlogQuote;
use App\Models\BlogCategory;
use App\Models\BlogParagraph;
use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'CategoryID');
    }

    public function paragraphs()
    {
        return $this->hasMany(BlogParagraph::class, 'BlogID');
    }

    // public function quotes()
    // {
    //     return $this->hasMany(BlogQuote::class, 'BlogID');
    // }

    // public function tags()
    // {
    //     return $this->hasMany(BlogTags::class, 'BlogID');
    // }
}
