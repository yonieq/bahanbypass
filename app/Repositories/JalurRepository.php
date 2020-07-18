<?php

namespace App\Repositories;

use App\Models\Jalur;
use App\Repositories\BaseRepository;

/**
 * Class JalurRepository
 * @package App\Repositories
 * @version June 26, 2020, 9:48 am UTC
*/

class JalurRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'lokasi',
        'estimasi',
        'jumlah_pos',
        'status',
        'foto',
        'file'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Jalur::class;
    }
}
