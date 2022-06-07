<?php

namespace App\Enums;

enum CharityCategory: string
{
    case AGRICULTURE = 'Agriculture';
    case CHILDREN_AND_YOUTH = 'Children and Youth';
    case COMMUNITY_DEVELOPMENT = 'Community Development';
    case EDUCATION = 'Education';
    case ENVIRONMENT = 'Environment';
    case WILDLIFE_PROTECTION = 'Wildlife Protection';
    case WOMENS_EMPOWERMENT = 'Women\'s Empowerment';
    case ANIMAL_CONSERVATION = 'Animal Conservation';

    public static function getCategories() {
        return collect(CharityCategory::cases())
            ->map(function ($item, $key) {
                return ['value' => $item->value, 'name' => $item->name];
            })
            ->toArray();
    }

    public static function getCategoriesName() {
        return collect(CharityCategory::cases())
            ->pluck('name')
            ->toArray();
    }
}
