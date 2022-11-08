<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @method static self create(array $data)
 */
class Room extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    * @var array
    */
    protected $fillable = [
        'number', 'hotel_id'
    ];

    //########################################### Constants ################################################


    //########################################### Accessors ################################################


    //########################################### Mutators #################################################


    //########################################### Scopes ###################################################


    //########################################### Relations ################################################


}

