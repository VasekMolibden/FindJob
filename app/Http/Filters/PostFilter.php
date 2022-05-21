<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TEXT = 'text';
    public const POST_TYPE_ID = 'post_type_id';
    public const SALARY_FROM = 'salary_from';
    public const SALARY_TO = 'salary_to';
    public const CITY_ID = 'city_id';
    public const CATEGORY_ID = 'category_id';
    public const EDUCATION_ID = 'education_id';
    public const WORK_EXPERIENCE_ID = 'work_experience_id';
    public const WORK_SCHEDULE_ID = 'work_schedule_id';


    protected function getCallbacks(): array
    {
        return [
            self::TEXT => [$this, 'text'],
            self::POST_TYPE_ID => [$this, 'post_type_id'],
            self::SALARY_FROM => [$this, 'salary_from'],
            self::SALARY_TO => [$this, 'salary_to'],
            self::CITY_ID => [$this, 'city_id'],
            self::CATEGORY_ID => [$this, 'category_id'],
            self::EDUCATION_ID => [$this, 'education_id'],
            self::WORK_EXPERIENCE_ID => [$this, 'work_experience_id'],
            self::WORK_SCHEDULE_ID => [$this, 'work_schedule_id'],
        ];
    }

    public function text(Builder $builder, $value)
    {
        if($value[0]) {
            $builder->where(function ($q) use ($value) {
                $q->where('name', 'like', "%{$value[0]}%")
                    ->orWhere('description', 'like', "%{$value[0]}%");
            });
        }
    }

    public function post_type_id(Builder $builder, $value)
    {
        $builder->where('post_type_id', $value);
    }

    public function salary_from(Builder $builder, $value)
    {
        $builder->where('salary', '>=', $value);
    }

    public function salary_to(Builder $builder, $value)
    {
        $builder->where('salary', '<=', $value);
    }

    public function city_id(Builder $builder, $value)
    {
        if($value[0]){
            $builder->whereIn('city_id', $value[0]);
        }
    }

    public function category_id(Builder $builder, $value)
    {
        if($value[0]) {
            $builder->whereIn('category_id', $value[0]);
        }
    }

    public function education_id(Builder $builder, $value)
    {
        if($value[0]) {
            $builder->whereIn('education_id', $value[0]);
        }
    }

    public function work_experience_id(Builder $builder, $value)
    {
        if($value[0]) {
            $builder->whereIn('work_experience_id', $value[0]);
            //$builder->whereIn('work_experience', 'like', $value[0]);
        }
    }

    public function work_schedule_id(Builder $builder, $value)
    {
        if($value[0]) {
            $builder->whereIn('work_schedule_id', $value[0]);
        }
    }
}
