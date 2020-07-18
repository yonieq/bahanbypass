<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Jalur
 * @package App\Models
 * @version June 26, 2020, 9:48 am UTC
 *
 * @property string $nama
 * @property string $lokasi
 * @property string $estimasi
 * @property string $jumlah_pos
 * @property string $status
 * @property string $foto
 * @property string $file
 */
class Jalur extends Model
{
    use SoftDeletes;

    public $table = 'jalurs';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'lokasi',
        'estimasi',
        'jumlah_pos',
        'status',
        'foto',
        'file'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'lokasi' => 'string',
        'estimasi' => 'string',
        'jumlah_pos' => 'string',
        'status' => 'string',
        'foto' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    
    
}
