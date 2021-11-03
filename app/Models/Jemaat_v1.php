<?php

namespace App\Models;

use Eloquent as Model;



/**
 * @SWG\Definition(
 *      definition="Jemaat_v1",
 *      required={""},
 *      @SWG\Property(
 *          property="nik",
 *          description="nik",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="nama_lengkap",
 *          description="nama_lengkap",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="nomor_whatsapp",
 *          description="nomor_whatsapp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat_domisili",
 *          description="alamat_domisili",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal_lahir",
 *          description="tanggal_lahir",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="kartu_vaksin",
 *          description="kartu_vaksin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Jemaat_v1 extends Model
{


    public $table = 'jemaat_v1s';
    



    public $fillable = [
        'nik',
        'nama_lengkap',
        'nomor_whatsapp',
        'alamat_domisili',
        'tanggal_lahir',
        'kartu_vaksin'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nik' => 'string',
        'nama_lengkap' => 'string',
        'nomor_whatsapp' => 'string',
        'alamat_domisili' => 'string',
        'tanggal_lahir' => 'date',
        'kartu_vaksin' => 'string',
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function relasiIbadahJemaats()
    {
        return $this->morphToMany(Ibadah::class, 'ibadah_jemaat_id', );
    }
}
