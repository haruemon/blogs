<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CsvImportRequest;

class CsvImportController extends Controller
{

    public $fileName;

    /**
     * Display a listing of the resource.
     *
     * @param  string $table_name
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(string $table_name)
    {
        $model_name = Str::studly(Str::singular($table_name));
        $model = 'App\\Imports\\' . $model_name . 'Import';
        $heading_row = $model::$heading_row;

        return view('csv_import.index', compact('heading_row', 'table_name', 'model_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param                \Illuminate\Http\Request  $request
     * @return        \Illuminate\Http\Response
     */
    public function store(CsvImportRequest $request, string $table_name)
    {
        $validated = $request->validated();
        $model_name = Str::studly(Str::singular($table_name));

        $this->fileName = $validated['csv_file']->getClientOriginalName();

        if ($model_name) {
            if (!class_exists('App\\' . $model_name)) {
                return back()->with('error', __('message.import_error') . $model_name . 'モデルは存在しません。');
            }
        }

        // CSVファイルをサーバーに保存
        $temporary_csv_file = storage_path('app/' . $validated['csv_file']->store('csv'));

        $import_model = 'App\\Imports\\' . $model_name . 'Import';

        DB::beginTransaction();

        try {
            Excel::import(new $import_model, $temporary_csv_file);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $this->deleteTemporaryFile($temporary_csv_file);
            return back()->with('error', __('message.import_error') . $e->getMessage());
        }

        $this->deleteTemporaryFile($temporary_csv_file);
        return back()->with('success', __('message.import_success'));
    }

    public function deleteTemporaryFile(string $file_path)
    {
        if (\File::exists($file_path)) {
            \File::delete($file_path);
        }
    }

}
