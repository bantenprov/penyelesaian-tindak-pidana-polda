<?php

namespace Bantenprov\TindakPidanaPolda\Models\Bantenprov\TindakPidanaPolda;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TindakPidanaPolda extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'tindak_pidana_poldas';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
