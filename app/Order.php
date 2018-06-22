<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable
        = [
            'name',
            'email',
            'phone',
            'count',
            'message',
            'grant',
            'complete',
            'created_at',
        ];
    protected $table = 'orders';

    public static function trash($id)
    {
        $row = self::query()->find($id);
        $row->delete();
        return true;
    }

    public static function complete($id)
    {
        $row = self::query()->find($id);
        $row->complete = true;
        $row->save();
        return true;
    }
}
