<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $transaction
 * @property mixed $petty_cash_replenishment_form
 */
class PettyCashVoucher extends Model
{
    protected $fillable = [
        'date_requested', 'amount_requested', 'purpose', 'amount_spent', 'amount_returned',
        'date_returned', 'payee', 'details', 'transaction_id', 'pcrf_id',
    ];

    public function transaction(){
        return $this->hasOne('App/Transaction','form_id','transaction_id');
    }

    public function pettyCashReplenishmentForm(){
        return $this->belongsTo('App/PettyCashReplenishmentForm','id','pcrf_id');
    }
}
