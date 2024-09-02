<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = ['code','nomclasse','filiere_id','etablissement_id'];

    public function listeclassbyecole()
    {
        $ecoleId = auth()->user()->etablissement_id;

        $listeclasse = DB::table('classes AS cl')
            ->where('cl.etablissement_id','=', $ecoleId)
            ->join('filieres AS f','f.id','=','cl.filiere_id')
            ->join('niveaux AS n','n.id','=','f.niveau_id')
            ->leftjoin('users AS u','u.classe_id','=','cl.id')
            ->select('cl.id','f.nomfiliere','cl.code','nomclasse','cl.filiere_id','n.nomniveau',DB::raw("COUNT('u.id') AS effectif_classe"))
            ->groupBy('cl.id','f.nomfiliere','cl.code','nomclasse','cl.filiere_id','n.nomniveau')
            ->get();

        return $listeclasse;
    }
}
