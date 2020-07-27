<?php

namespace App;


use App\Http\Controllers\Categories;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use CrudTrait;

    protected $table = "posts";
    protected $primaryKey = "id";
    protected $guarded = ['id'];

    public function categories(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

}
