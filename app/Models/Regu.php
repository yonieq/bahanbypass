<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Regu
 * @package App\Models
 * @version June 26, 2020, 9:39 am UTC
 *
 * @property string $regu
 * @property string $jumlah_anggota
 * @property string $jalur_id
 * @property string $foto
 * @property string $file
 */
class Regu extends Model
{
    use SoftDeletes;

    public $table = 'regus';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'regu',
        'jumlah_anggota',
        'jalur_id',
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
        'regu' => 'string',
        'jumlah_anggota' => 'string',
        'jalur_id' => 'string',
        'foto' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'regu' => 'required',
        'jumlah_anggota' => 'required',
        'jalur_id' => 'required',
        'foto' => 'required',
        'file' => 'required'
    ];

	public function perlengkapans(){
    	return $this->hasMany("App\Perlengkapans");
    }
}
