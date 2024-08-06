<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'image',
        'description',
        'tags',
        'is_publish',
        'author',
        'publish_date',
        'status',

    ];

    protected $casts = [
        'publish_date' => 'datetime',
    ];

    protected $table  = 'blogs';






    public static function getFrontRecord()
    {
        $return = Blog::select('blogs.*', 'users.name as user_name', 'categories.name as categories_name')
            ->join('users', 'blogs.user_id', '=', 'users.id')
            ->join('categories', 'blogs.category_id', '=', 'categories.id')
            ->where('blogs.is_publish', 1)
            ->where('blogs.status', 0)
            ->where('blogs.is_delete', 0);

        // Apply filters
        $title = request()->get('title');
        $author = request()->get('author');
        $date = request()->get('date');
        $category = request()->get('category');
        if (!empty($title)) {
            $return = $return->where('title', 'like', '%' . $title . '%');
        } elseif (!empty($author)) {
            $return = $return->where('author', 'like', '%' . $author . '%');
        } elseif (!empty($date)) {
            $return = $return->whereDate('created_at', "=", $date);
        }
        if (!empty($category)) {
            $return = $return->where('blogs.category_id', $category);
        }

        // Order by and paginate
        $return = $return->orderBy('blogs.id', 'desc')->paginate(6);

        return $return;
    }






    //acceser
    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 0 ? 'Active' : 'Inactive';
    }

    public function getIsPublishAttribute()
    {
        return $this->attributes['is_publish'] == 0 ? 'No' : 'Yes';
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    public function getPublishDateFormattedAttribute()
    {
        return $this->publish_date->format('d/m/Y H:i');
    }


    // Mutator to remove HTML tags from description
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strip_tags(trim($value));
    }


    static public function getRecord()
    {
        $return = Blog::select('*')
            ->where('is_delete', '=', 0);

        //search
        $title = request()->get('title');
        $author = request()->get('author');
        $date = request()->get('date');
        if (!empty($title)) {
            $return = $return->where('title', 'like', '%' . $title . '%');
        } elseif (!empty($author)) {
            $return = $return->where('author', 'like', '%' . $author . '%');
        } elseif (!empty($date)) {
            $return = $return->whereDate('created_at', "=", $date);
        }
        //search

        $return = $return->orderBy('id', 'desc')->paginate(10);

        return $return;
    }

    static public function getSingleData($id)
    {
        return Blog::find($id);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
