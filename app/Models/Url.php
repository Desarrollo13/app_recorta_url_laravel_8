<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Classes\CodeGeneretor;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['url', 'user_id'];
    public $timestamps = false;
    public function user()
    {
        $this->belongsTo('App\Models\User');
    }
    public function short_url($long_url)
    {
        // Crear la url
        $url = self::create([

            'url' => $long_url,
            'user_id' => auth()->user()->id

        ]);
        // generacion de codigo
        $code = (new CodeGeneretor())->get_code($url->id);

        // Actualiza el codigo de la url
        $url->code = $code;
        $url->save();
        return $url->code;
    }
}
