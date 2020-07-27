<?php

namespace App\Http\Controllers;

use App\Category;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Illuminate\Http\Request;

class Categories extends CrudController
{
    use ListOperation;
    use ShowOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;

    public function setup()
    {
        $this->crud->setModel('App\Category');
        $this->crud->setRoute(config('backpack.base.route_prefix'). '/categories');
        $this->crud->setEntityNameStrings('Category','Categories');

        $categories = $this->categories();

        $this->crud->setColumns([
            [
            'label' => 'ID',
            'name' => 'id',

        ],

        [
            'name' => 'category',
            'label' => 'Category'
        ]
    ]);

        $this->crud->addFields([
           [
               'lable' => 'ID',
                'name' => 'Category',
           ],
            [
                'label' => 'id',
                'name' => 'ID'
            ]


        ]);
    }


    public function categories(): array{
        $categories = (new Category())->get();
        $response = [];
        foreach ($categories as $category) {
            $response[$category->id] = $category->title;
        }
        return $response;

    }
}
