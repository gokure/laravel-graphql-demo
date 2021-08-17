<?php

namespace App\GraphQL\Types;

use App\Models\Category;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CategoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Category',
        'descriptin' => 'Collection of categories',
        'model' => Category::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::id()),
                'description' => 'Id of the category',
            ],
            'title' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Title of the category',
            ],
            'quests' => [
                'type' => Type::listOf(GraphQL::type('Quest')),
                'description' => 'List of quests',
            ],
        ];
    }
}
