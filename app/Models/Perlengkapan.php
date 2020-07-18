<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Perlengkapan
 * @package App\Models
 * @version June 26, 2020, 9:47 am UTC
 *
 * @property integer $regu_id
 * @property string $navigasi
 * @property string $foto
 * @property string $file
 */
class Perlengkapan extends Model
{
    use SoftDeletes;

    public $table = 'perlengkapans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'regu_id',
        'navigasi',
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
        'regu_id' => 'integer',
        'navigasi' => 'string',
        'foto' => 'string',
        'file' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    

    public function regu(){
		return $this->belongsTo("App\Models\Regu", "regu_id");
	}
}
