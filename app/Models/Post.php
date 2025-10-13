<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



Class Post extends Model{

    use HasFactory;

    protected $with = ['author', 'category'];

    protected $fillable = ['title', 'slug', 'body', 'author_id', 'category_id'];

    public function author(): BelongsTo { 
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo { 
        return $this->belongsTo(Category::class);
    }

}

?>