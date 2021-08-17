<?php

namespace App\GraphQL\Mutations\Quest;

use App\Models\Quest;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;

class DeleteMutation extends Mutation
{
    protected $attributes = [
        'name' => 'deleteQuest',
        'description' => 'Deletes the quest',
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
        $quest = Quest::findOrFail($args['id']);

        return $quest->delete() ? true : false;
    }
}
