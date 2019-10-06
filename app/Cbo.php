<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cbo extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'code', 'description'
    ];

    /** Recupera os profissionais que possuem um determinado CBO
     *
     * @return HasMany
     */
    public function professionals(): HasMany
    {
        return $this->hasMany(Professional::class);
    }
}
