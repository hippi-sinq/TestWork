<?php

namespace App\Http\Controllers;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Illuminate\Http\Request;

class PostsController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use ShowOperation;
    use UpdateOperation;
    use DeleteOperation;

    public function setup()
    {

        $this->crud->setModel('App\Posts');
        $this->crud->setRoute(config('backpack.base.route_prefix'). '/posts');
        $this->crud->setEntityNameStrings('Post','Posts');



        $this->crud->setColumns([
            [
                'lable' => 'id',
                'name' => 'ID',

            ],
            [
                'lable' => 'name',
                'name' => 'Name'
            ],
            [
                'lable' => 'content',
                'name' => 'Content'
            ],
            [
                'lable' => 'category_id',
                'name' => 'Category'
            ]
        ]);

        $this->crud->addFields([
            [
                'lable' => 'id',
                'name' => 'ID'
            ],
            [
                'lable' => 'name',
                'name' => 'Name'
            ],
            [
                'lable' => 'content',
                'name' => 'Content',
                'type' => 'ckeditor'
            ],
            [
                'lable' => 'category',
                'type' => 'select2_multiple',
                'name' => 'categories',
                'entity' => 'categories',
                'attribute' => 'category',
                'pivot' => true,
//                'model' => 'App\Category',
//                'options' => (function($query){
//                    return $query->orderBy('Category','ASC')->get();
//                })
            ],

        ]);
    }



}
