<?php

namespace App\Models;

use App\Traits\HasFilters;
use App\Traits\HasSorts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class Hotel extends Model
{
    use HasFactory;
    use HasFilters;
    use HasSorts {
        HasSorts::getModelClassName insteadof HasFilters;
    }


    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'name', 'country_code', 'city_id', 'price'
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

}

