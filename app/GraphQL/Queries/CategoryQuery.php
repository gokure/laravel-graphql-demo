<?php

namespace App\GraphQL\Queries;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'category',
    ];

    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::id(),
                'rules' => ['required'],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Category::findOrFail($args['id']);
    }
}
