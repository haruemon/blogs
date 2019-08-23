<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvImportRequest extends FormRequest
{
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
        return [
            'csv_file' => [
                'required',
                'max:1024', // php.iniのupload_max_filesizeとpost_max_sizeを考慮する必要があるので注意
                'file',
                'mimes:csv,txt,xls,xlsx', // mimesの都合上text/csvなのでtxtも許可が必要
                'mimetypes:text/plain,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            ]
        ];
    }

    /**
     * Get error message of predefined validation rule.
     *
     * @return  array
     */
    public function messages()
    {
        return [
            'csv_file.required' => 'ファイルは必須です。',
            'csv_file.max'  => 'ファイルサイズが大きすぎます。',
            'csv_file.file'  => 'ファイルをアップロードに失敗しました。',
            'csv_file.mimes'  => '拡張子はcsv,txt,xls,xlsxのみです。',
            'csv_file.mimetypes'  => 'アップロードできないファイルタイプです。',
        ];
    }
}
