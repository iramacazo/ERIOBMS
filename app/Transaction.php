<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $proposed_budget
 * @property mixed $user
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $payment_requisition_slip
 * @property mixed $petty_cash_voucher
 */
class Transaction extends Model
{

    // TODO Confirm where they get the whole of 30%
    protected $fillable = [
        'owner', 'budget_id', 'category', 'transaction_date', 'amount','item_name', 'description',
        'form_id', 'paid_in_petty_cash', 'term',
    ];

    public function user(){
        return $this->belongsTo('App/User', 'owner', 'username');
    }

    public function proposedBudget(){
        return $this->belongsTo('App/ProposedBudget','budget_id','id');
    }

    public function paymentRequisitionSlip(){
        return $this->hasOne('App/PaymentRequisitionSlip','prs_id','form_id');
    }

    public function pettyCashVoucher(){
        return $this->hasOne('App/PettyCashVoucher', 'transaction_id','form_id');
    }
}
