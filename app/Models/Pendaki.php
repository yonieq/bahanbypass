<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pendaki
 * @package App\Models
 * @version June 26, 2020, 9:55 am UTC
 *
 * @property string $nama
 * @property string $alamat
 * @property string $regu_id
 * @property string $tanggal_mendaki
 * @property string $foto
 * @property string $file
 */
class Pendaki extends Model
{
    use SoftDeletes;

    public $table = 'pendakians';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nama',
        'alamat',
        'regu_id',
        'tanggal_mendaki',
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
        'alamat' => 'string',
        'regu_id' => 'string',
        'tanggal_mendaki' => 'date',
        'foto' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'alamat' => 'required',
        'tanggal_mendaki' => 'required',
        'foto' => 'required',
        'file' => 'required'
    ];

    
}
