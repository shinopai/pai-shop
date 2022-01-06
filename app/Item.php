<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_name', 'body', 'price', 'item_image', 'category_id'
    ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function stock(){
        return $this->hasOne('App\Stock');
    }

    public function carts(){
        return $this->hasMany('App\Cart');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
}
