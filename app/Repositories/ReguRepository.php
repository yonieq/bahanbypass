<?php

namespace App\Repositories;

use App\Models\Regu;
use App\Repositories\BaseRepository;

/**
 * Class ReguRepository
 * @package App\Repositories
 * @version June 26, 2020, 9:39 am UTC
*/

class ReguRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'regu',
        'jumlah_anggota',
        'jalur_id',
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
        return Regu::class;
    }
}
