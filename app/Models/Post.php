<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt', 'body', 'category_id', 'user_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // Used for search function
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) => $query->where(fn($query) => $query
            ->where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')
        ));

        // Includes the categories in search
        $query->when($filters['category'] ?? false,
            fn($query, $category) => $query->whereHas('category',
                fn($query) => $query->where('name', $category)));
    }
}
