<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Professional extends Model
{
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'cns', 'assignment_date', 'workload', 'sus', 'cbo_id', 'bond_id', 'type_id', 'origin'
    ];

    /** Recupera o CBO de um usuário
     *
     * @return BelongsTo
     */
    public function cbo(): BelongsTo
    {
        return $this->belongsTo(Cbo::class);
    }

    /** Recupera a vinculação de um usuário
     *
     * @return BelongsTo
     */
    public function bond(): BelongsTo
    {
        return $this->belongsTo(Bond::class);
    }

    /** Recupera o Tipo de vínculo de um usuário
     *
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class);
    }
}
