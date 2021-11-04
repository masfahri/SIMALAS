<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MappingMapelToGuruModel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'mapping_mapel_to_guru';
    protected $fillable = [
        'kd_guru',
        'kd_mapel',
        'kd_mapping_mapel_to_guru'
    ];

    /**
     * Get all of the Jadwal for the MappingMapelToGuruModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function Jadwal(): HasMany
    {
        return $this->hasMany(MappingJadwalPelajaranModel::class, 'kd_mapels', 'kd_mapping_mapel_to_guru');
    }

    /**
     * Get the Guru that owns the MappingMapelToGuruModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Guru(): BelongsTo
    {
        return $this->belongsTo(GuruModel::class, 'kd_guru', 'kd_guru');
    }

    /**
     * Get the MataPelajaran that owns the MappingMapelToGuruModel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function MataPelajaran(): BelongsTo
    {
        return $this->belongsTo(MataPelajaranModel::class, 'kd_mapel', 'kd_mapel');
    }
}
