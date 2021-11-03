<?php

namespace App\Repositories;

use App\Models\Ibadah;
use App\Repositories\BaseRepository;

/**
 * Class IbadahRepository
 * @package App\Repositories
 * @version November 2, 2021, 11:56 pm UTC
*/

class IbadahRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_ibadah',
        'tanggal',
        'deskripsi',
        'jam_ibadah',
        'background_image',
        'quota'
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
        return Ibadah::class;
    }
}
