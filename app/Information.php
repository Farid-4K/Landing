<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Information extends Model
{

    protected $table = 'information';

    public static $message;

    protected $fillable
        = [
            'tag_id',
            'information',
            'description'
        ];

    public static function trash($id)
    {
        $row = self::query()->find($id);
        $row->delete();
        return true;
    }

    public static function checkUploadData($input)
    {
        $directory = env('IMAGES_PATH');
        $destinationPath = public_path() . $directory;
        $filename = str_random(20) . '.' . $input->getClientOriginalExtension()
            ?: 'jpg';
        $output = $directory . '/' . $filename;
        $input->move($destinationPath, $filename);
        Storage::put('image/', $filename);
        self::$message = 'Загружено';
        return $output;
    }

}
