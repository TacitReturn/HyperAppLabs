<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|',
            'description' => 'required|string|min:10',
            'content' => 'required|string|min:10',
            'image' => 'nullable|image',
            'video' => 'nullable|mimetypes:video/webm,video/x-matroska,video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi',
            'published_at' => 'required|date',
            'category' => 'required|int',

        ];
    }
}
