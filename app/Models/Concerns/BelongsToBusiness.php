<?php

namespace App\Models\Concerns;

use App\Models\Business;
use App\Scopes\BusinessScope;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;

trait BelongsToBusiness
{
    protected static function bootBelongsToBusiness(): void
    {
        static::addGlobalScope(new BusinessScope());

        static::creating(function ($model): void {
            if ($model->business_id !== null) {
                return;
            }

            $businessId = Auth::user()?->business_id;

            if ($businessId !== null) {
                $model->business_id = $businessId;
            }
        });
    }

    public function business(): BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}
