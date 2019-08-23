<?php

namespace App\Imports;

use App\User;
use App\Exceptions\CsvImportException;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class UserImport implements ToModel, WithHeadingRow
{
    use Importable;

    public static $heading_row = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public static $need_row = [
        'id',
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    /**
     * @param  array $row
     *
     * @return  \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        try {

            $this->checkNeedRow($row);

            $user = User::where('id', $row['id'])->first();
            if ($user !== NULL) {
                foreach ($row as $column => $value) {
                    if ($column === 'created_at') {
                        continue;
                    } elseif ($column === 'updated_at') {
                        $user->$column = Carbon::now();
                    } else {
                        $user->$column = $value;
                    }
                }
                return $user;
            } else {
                return new User($row);
            }
        } catch (CsvImportException $e) {
            throw $e;
        }

    }

    public function checkNeedRow($row)
    {
        $empty_need_row = [];
        foreach (self::$need_row as $need_row) {

            // 項目名が設定されていない場合
            if (!in_array($need_row, array_keys($row))) {
               $empty_need_row[] = $need_row;

            // 項目が空の場合
            } elseif (is_null($row[$need_row])) {
                $empty_need_row[] = $need_row;
            }
        }

        if (!empty($empty_need_row)) {
            throw new CsvImportException(implode(',', $empty_need_row) . '項目が未入力です。ファイルの内容をご確認ください。');
        }
    }
}
