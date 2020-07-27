<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;


class Category extends Model
{
    use CrudTrait;

    protected $table = "categories";
    protected $primaryKey = "id";
    protected $guarded = ['id'];



}
