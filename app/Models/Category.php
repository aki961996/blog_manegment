<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'title', 'description', 'keywords', 'is_delete', 'status'];

    protected $table = 'categories';

    //get student all data
    static public function getRecord()
    {
        return Category::select('categories.*')
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
    }
}
