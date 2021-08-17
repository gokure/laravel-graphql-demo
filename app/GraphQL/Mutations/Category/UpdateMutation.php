<?php

namespace App\GraphQL\Mutations\Category;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UpdateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updateCategory',
        'description' => 'Updates the category',
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
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required'],
            ],
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $category = Category::findOrFail($args['id']);
        $category->fill($args);
        $category->save();

        return $category;
    }
}
