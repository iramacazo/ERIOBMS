<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $transaction
 * @property mixed $user
 */
class PaymentRequisitionSlip extends Model
{
    protected $fillable = [
        'date', 'requested_by', 'prs_id',
    ];

    public function transaction(){
        return $this->hasMany('App/Transaction', 'form_id','prs_id');
    }

    public function user(){
        return $this->belongsTo('App/User', 'username', 'requested_by');
    }
}
