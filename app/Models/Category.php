<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'parent_id',
        'content',
        'status',
        'type',
    ];
    public function child()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }

    public static function deQuy($categories, $parent_id=0, $level =1, &$listCategory)
    {
        if(count($categories) >0){
            foreach($categories as $key =>$value) {
                if($value->parent_id == $parent_id){
                    $value->level = $level;
                    $listCategory[] = $value;
                    unset($listCategory[$key]);
                    $parent_id = $value->id;
                    self::deQuy($categories, $parent_id, $level + 1, $listCategory);
                }
            }
        }
    }
}
