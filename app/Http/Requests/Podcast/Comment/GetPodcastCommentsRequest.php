<?php

namespace App\Http\Requests\Podcast\Comment;

use Illuminate\Foundation\Http\FormRequest;

class GetPodcastCommentsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'podcast_id' => 'required|exists:podcasts,id',
        ];
    }
}
