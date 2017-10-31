<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $petty_cash_voucher
 */
class PettyCashReplenishmentForm extends Model
{
    protected $fillable = [
        'start_date', 'end_date',
    ];

    public function pettyCashVoucher(){
        return $this->hasMany('App/PettyCashVoucher','pcrf_id','id');
    }
}
