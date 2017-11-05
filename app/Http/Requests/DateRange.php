<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DateRange extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'mindate' => 'required|date',
            'maxdate' => 'required|date',
            //
        ];
    }
    public function validator($request){
        $validator = $request->make(
            $this->all(), $this->container->call([$this, 'rules'], $this->messages(), $this->attributes)
        );
        $validator->after(function ($validator){
            if(strtotime($this->mindate)>strtotime($this->maxdate)){
                $validator->errors()->add('date_range', 'Minimum date is less than maximum date');
            }
        });
    }
}
