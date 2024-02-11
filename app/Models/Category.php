<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    public function children() {
        return $this->hasMany('App\Models\Category','parent_id');
    }

    public static function tree($arguments = []) {
        $rows = self::where('parent_id',NULL)->where($arguments)->get();
        return self::hierarchy($rows);
    }

    function hierarchy($rows, $level = 0) {
        $result = array();

        foreach($rows as $row) {
            $row->level = $level;
            $result[] = $row;

            if($row->children->count()>0)
                $result = array_merge($result,self::hierarchy($row->children, $level+1));
        }

        return $result;
    }
}
