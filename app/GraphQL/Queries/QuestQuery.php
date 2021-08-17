<?php

namespace App\GraphQL\Queries;

use App\Models\Quest;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;

class QuestQuery extends Query
{
    protected $attributes = [
        'name' => 'quest',
    ];

    public function type(): Type
    {
        return GraphQL::type('Quest');
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
        return Quest::findOrFail($args['id']);
    }
}
