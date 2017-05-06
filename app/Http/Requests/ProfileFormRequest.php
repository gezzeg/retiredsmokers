<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Profile;

class ProfileFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

      //$profile = Profile::find($this->route('id'));
      //$profile = Profile::whereId($this->route('id'));
       // $id = $this->route('id');

      //return $this->user()->id == $profile->user_id;



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
            //
        ];
    }

    public function forbiddenResponse()
    {
        // Optionally, send a custom response on authorize failure 
        // (default is to just redirect to initial page with errors)
        // 
        // Can return a response, a view, a redirect, or whatever else
        return redirect()->back()->withError('Permission Denied', 403);
        //Response::make('Permission denied foo!', 403);
    }
}
