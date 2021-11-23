<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    public $timestamps = false;
    protected $fillable = ['url','codigo'];
    protected  $appends = ['link'];

    public function getLinkAttribute($link):array
    {
        return ['link'=> '/redireciona/'. $this->codigo];
    }

}
