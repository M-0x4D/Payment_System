<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'balance', 'password', 'api_token', 'status', 'pin_code', 'city_id', 'date_of_birth');

    public function city()
    {
        return $this->belongsTo('App\models\City');
    }

    public function country()
    {
        return $this->belongsTo('App\models\Country');
    }

    //! transtaction ==> one relation 

    public function transactions()
    {
        return $this->hasMany('App\models\Transaction');
    }


    //! role ==> one relation

    public function client_role()
    {
        return $this->belongsToMany('App\models\Role' , 'model_has_roles' , 'model_id');
    } 


    //! permission ==> one relation

    public function client_permisson()
    {
        return $this->belongsToMany('App\models\Permission' , 'model_has_permissions' , 'model_id');
    } 


}