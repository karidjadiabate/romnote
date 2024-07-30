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
            ->where('f.etablissement_id','=', $ecoleId)
            ->select('f.id','nomfiliere','f.code','n.nomniveau','f.niveau_id')
            ->get();

        return  $listefiliere;
    }
}
