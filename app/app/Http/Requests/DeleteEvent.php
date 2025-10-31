<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Event;

class DeleteEvent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->route('id')) {
            $event = Event::find($this->route('id'));
            return $event && $event->user_id === auth()->id();
        }
        return false;
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
}
