<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = ['nommatiere','etablissement_id'];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    //liste des matières par école
    public function listematierebyecole()
    {
        $ecoleId = auth()->user()->etablissement_id;

        $listematiere = DB::table('matieres')
            ->where('etablissement_id','=', $ecoleId)
            ->select('id','nommatiere')
            ->get();

        return  $listematiere;
    }
}
