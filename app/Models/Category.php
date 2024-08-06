<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'title', 'description', 'keywords', 'is_delete', 'status'];

    protected $table = 'categories';


    //acceser
    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 0 ? 'Active' : 'Inactive';
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }

    //Defining it as static allows it to be called without an instance of the Category model.

    //get student all data
    static public function getRecord()
    {
        return Category::select('categories.*')
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    static public function getSingleData($id)
    {
        return Category::find($id);
    }

    static public function getCategoryMenu()
    {
        return Category::select('categories.*')
            ->where('is_delete', 0)
            ->where('status', 0)
            ->get();
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
