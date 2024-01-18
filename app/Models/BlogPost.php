<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = [
        "user_id",
        "title",
        "content",
        "publication_date"
    ];

    public $timestamps = true;

    /**
     * User function to make one-to-one relation
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
