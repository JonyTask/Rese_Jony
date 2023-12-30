<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReserveRequest extends FormRequest
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
            "reserve_date" => ['required','after:today'],
            "reserve_time" => ['required'],
            "reserve_number" => ['required']
        ];
    }

    public function messages(){
        return [
            "reserve_date.required" => '必ず日付を入力してください',
            "reserve_date.after" => '今日より後の日付を指定してください',
            "reserve_time.required" => '必ず時間を入力してください',
            "reserve_number.required" => '必ず人数を入力してください'
        ];
    }
}
