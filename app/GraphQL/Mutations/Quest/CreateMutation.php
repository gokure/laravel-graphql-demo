<?php

namespace App\GraphQL\Mutations\Quest;

use App\Models\Quest;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CreateMutation extends Mutation
{
    protected $attributes = [
        'name' => 'createQuest',
        'description' => 'Creates a quest',
    ];

    public function type(): Type
    {
        return GraphQL::type('Quest');
    }

    public function args(): array
    {
        return [
            'title' => [
                'name' => 'title',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string()),
            ],
            'reward' => [
                'name' => 'reward',
                'type' => Type::nonNull(Type::int()),
            ],
            'category_id' => [
                'name' => 'category_id',
                'type' => Type::nonNull(Type::id()),
                'rules' => ['exists:categories,id'],
            ],
        ];
    }

    public function resolve($root, $args)
    {
        return Quest::create($args);
    }
}
