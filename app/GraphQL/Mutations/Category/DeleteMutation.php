<?php

namespace App\GraphQL\Mutations\Category;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteCategory',
        'description' => 'Deletes the category',
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::id()),
                'rules' => ['required'],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        $category = Category::findOrFail($args['id']);

        return $category->delete() ? true : false;
    }
}
