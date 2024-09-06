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

        $listeclasse = DB::table('classes AS c')
            ->where('c.etablissement_id','=', $ecoleId)
            ->join('filieres AS f','f.id','=','c.filiere_id')
            ->join('niveaux AS n','n.id','=','f.niveau_id')
            ->leftjoin('users AS u','u.classe_id','=','c.id')
            ->select('c.id','f.nomfiliere','c.code','c.nomclasse','c.filiere_id','n.nomniveau',DB::raw("COUNT(u.id) AS effectif_classe"))
            ->groupBy('c.id','f.nomfiliere','c.code','c.nomclasse','c.filiere_id','n.nomniveau')
            ->get();

        return $listeclasse;
    }
}
