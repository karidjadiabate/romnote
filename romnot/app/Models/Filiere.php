<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Filiere extends Model
{
    use HasFactory;

    protected $fillable = ['code','nomfiliere','niveau_id','etablissement_id'];

    public function listefilierebyecole()
    {
        $ecoleId = auth()->user()->etablissement_id;

        $listefiliere = DB::table('filieres AS f')
            ->join('niveaux AS n','n.id','=','f.niveau_id')
            ->join('classes AS c','c.filiere_id','=','f.id')
            ->where('f.etablissement_id','=', $ecoleId)
            ->select('f.id','f.nomfiliere','f.code','n.nomniveau','f.niveau_id',DB::raw('COUNT(c.id) AS nbclasse'))
            ->groupBy('f.id', 'f.nomfiliere', 'f.code', 'n.nomniveau', 'f.niveau_id')
            ->get();

        return  $listefiliere;
    }
}
