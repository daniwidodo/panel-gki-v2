<?php

namespace App\Repositories;

use App\Models\Jemaat_v1;
use App\Repositories\BaseRepository;

/**
 * Class Jemaat_v1Repository
 * @package App\Repositories
 * @version November 3, 2021, 12:06 am UTC
*/

class Jemaat_v1Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nik',
        'nama_lengkap',
        'nomor_whatsapp',
        'alamat_domisili',
        'tanggal_lahir',
        'kartu_vaksin'
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
        return Jemaat_v1::class;
    }
}
