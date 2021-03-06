<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $user
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $transaction
 */
class ProposedBudget extends Model
{
    protected $fillable = [
        'proposing_user', 'academic_year',  'approval_status', 'supplies', 'transportation',
        'mailing', 'meeting_expenses', 'workshop', 'mimeo', 'telephone', 'repairs_and_maintenance', 'publication',
        'uniform', 'international_travel', 'representation', 'tokens', 'commitments_official', 'membership',
        'internationalization_programs', 'activities', 'capex', 'orientation_programs', 'commitments_student', 
        'support_for_outbound_students', 'international_events'
    ];

    public function user(){
        return $this->belongsTo('App/User', 'proposing_user','username');
    }

    public function transaction(){
        return $this->hasMany('App/Transaction', 'budget_id', 'id');
    }
}
