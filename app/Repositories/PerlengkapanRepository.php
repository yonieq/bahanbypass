<?php

namespace App\Repositories;

use App\Models\Perlengkapan;
use App\Repositories\BaseRepository;

/**
 * Class PerlengkapanRepository
 * @package App\Repositories
 * @version June 26, 2020, 9:47 am UTC
*/

class PerlengkapanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'regu_id',
        'navigasi'
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
        return Perlengkapan::class;
    }
}
