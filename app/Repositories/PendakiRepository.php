<?php

namespace App\Repositories;

use App\Models\Pendaki;
use App\Repositories\BaseRepository;

/**
 * Class PendakiRepository
 * @package App\Repositories
 * @version June 26, 2020, 9:55 am UTC
*/

class PendakiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'regu_id',
        'tanggal_mendaki',
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
        return Pendaki::class;
    }
}
