<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ProjectInvitationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('manage', $this->route('project'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $email = $this->user()->email;
        return [
            'email' => "required|email|exists:users,email|not_in:$email"
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'The user you are inviting must have a Birdboard account.',
            'email.not_in' => 'Project owners cannot invite themselves.'
        ];
    }
}
