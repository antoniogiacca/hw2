<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veicoli extends Model {
    
    protected $table = 'veicolis';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'titolo',
        'prezzo',
        'descrizione',
        'immagine',
    ];
/*
    protected $casts = [    //conversione dati in json per esempio in array 
        'content' => 'array'
    ];*/

    public function users() {
        return $this-> belongsToMany(User::class, "PREFERITI", "VEICOLI", "USER");
    }

}
?>