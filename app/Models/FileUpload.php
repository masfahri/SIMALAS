<?php

namespace App\Models;

use App\Models\Guru\Materi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FileUpload extends Model
{
    use HasFactory;
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

    /**
     * Get the Materi that owns the FileUpload
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Materi(): BelongsTo
    {
        return $this->belongsTo(Materi::class, 'parent_id', 'kd_materi');
    }
}
