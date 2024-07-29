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

        $listematiere = DB::table('filieres')
            ->where('etablissement_id','=', $ecoleId)
            ->select('id','nomfiliere','code')
            ->get();

        return  $listematiere;
    }
}
