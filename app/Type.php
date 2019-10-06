<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'description'
    ];

    /** Recupera os profissionais que possuem um determinado tipo de vínculo
     *
     * @return HasMany
     */
    public function professionals(): HasMany
    {
        return $this->hasMany(Professional::class);
    }
}
