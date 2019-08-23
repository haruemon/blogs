<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    private $post_id = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return  bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return  array
     */
    public function rules()
    {
        $this->post_id = is_null($this->post) ? null : $this->post->id;

        return [
            'user_id' => 'required|numeric|min:0',
            'title' => 'required|max:255',
            'body' => 'required|max:65535',
            'status' => 'required|boolean',
            'published_at' => 'required|date',
        ];
    }

    public function attributes()
    {
        return [
            'id' => 'id',
            'user_id' => 'ユーザID',
            'title' => 'タイトル',
            'body' => '本文',
            'status' => 'ステータス',
            'published_at' => '公開日',
            'deleted_at' => 'deleted_at',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
        ];
    }

    public function message()
    {
        return [
            //
        ];
    }
}
