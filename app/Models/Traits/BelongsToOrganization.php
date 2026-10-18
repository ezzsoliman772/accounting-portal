<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BelongsToOrganization
{
    protected static function bootBelongsToOrganization()
    {
        // 1. الفلترة التلقائية: أي قراءة للبيانات هتجيب بتاع الشركة الحالية بس
        static::addGlobalScope('organization', function (Builder $builder) {
            if (auth()->check() && auth()->user()->organization_id) {
                $builder->where($builder->getModel()->getTable() . '.organization_id', auth()->user()->organization_id);
            }
        });

        // 2. الإضافة التلقائية: أي تسجيل جديد هياخد الـ organization_id لوحده
        static::creating(function ($model) {
            if (auth()->check() && !$model->organization_id) {
                $model->organization_id = auth()->user()->organization_id;
            }
        });
    }
}