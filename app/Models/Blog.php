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

    //get student all data
    static public function getRecord()
    {
        return Blog::select('blogs.*')
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
    }
}
