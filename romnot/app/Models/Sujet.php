<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sujet extends Model
{
    use HasFactory;

    protected $fillable = ['code','type_sujet_id','filiere_id','matiere_id','classe_id','noteprincipale','heure','status','user_id','etablissement_id'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }

    public function listesujetbyprof()
    {

        $listesujet = DB::table('sujets AS s')
            ->join('matieres AS m','m.id','=','s.matiere_id')
            ->join('filieres AS f','f.id','=','s.filiere_id')
            ->join('classes AS c','c.id','=','s.classe_id')
            ->join('users AS u','u.id','=','s.user_id')
            ->select('s.id','s.code','m.nommatiere','f.nomfiliere','c.nomclasse','s.created_at','s.status')
            ->where('s.user_id',auth()->user()->id)
            ->get();

        return $listesujet;
    }
}
