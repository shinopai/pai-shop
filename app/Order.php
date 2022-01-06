<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'item_id', 'orders', 'sum_total'
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

    /**
     * relation
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function item(){
        return $this->belongsTo('App\Item');
    }
}
