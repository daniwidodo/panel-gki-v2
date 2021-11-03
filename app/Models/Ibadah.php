<?php

namespace App\Models;

use Eloquent as Model;



/**
 * @SWG\Definition(
 *      definition="Ibadah",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
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
 *          property="nama_ibadah",
 *          description="nama_ibadah",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tanggal",
 *          description="tanggal",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deskripsi",
 *          description="deskripsi",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jam_ibadah",
 *          description="jam_ibadah",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="background_image",
 *          description="background_image",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="quota",
 *          description="quota",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Ibadah extends Model
{


    public $table = 'ibadahs';
    



    public $fillable = [
        'nama_ibadah',
        'tanggal',
        'deskripsi',
        'jam_ibadah',
        'background_image',
        'quota'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama_ibadah' => 'string',
        'tanggal' => 'string',
        'deskripsi' => 'string',
        'jam_ibadah' => 'string',
        'background_image' => 'string',
        'quota' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function relasiIbadahJemaats()
    {
        return $this->morphToMany(Jemaat_v1::class, 'ibadah_jemaat_id', );
    }

    
}
