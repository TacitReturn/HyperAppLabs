<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|unique:posts',
            'description' => 'required|string|min:10',
            'content' => 'required|string|min:10',
            'image' => 'required|image',
            'video' => 'mimetypes:video/webm,video/x-matroska,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'published_at' => 'required|date',
            'category' => 'required',
            'tags' => 'nullable',
        ];
    }
}
