<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function children() {
        return $this->hasMany('App\Models\Category','parent_id');
    }

    public static function tree() {
        $rows = self::where('parent_id',NULL)->get();
        return self::branches($rows);
    }

    public static function branches($rows, $level = 0) {
        $result = array();
        foreach($rows as $row) {
            $row->level = $level;
            $result[] = $row;
            if($row->children->count()>0) {
                $result = array_merge($result,self::branches($row->children, $level+1));
            }
        }
        return $result;
    }
}
