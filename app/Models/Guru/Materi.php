<?php

namespace App\Models\Guru;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materi extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the Guru that owns the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Guru(): BelongsTo
    {
        return $this->belongsTo(GuruModel::class, 'kd_guru', 'kd_guru');
    }

    /**
     * Get the Mapel that owns the Materi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Mapel(): BelongsTo
    {
        return $this->belongsTo(MataPelajaranModel::class, 'kd_mapel', 'kd_mapel');
    }
}
