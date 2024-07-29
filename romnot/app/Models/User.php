<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'username',
        'matricule',
        'role_id',
        'classe_id',
        'selected_classes',
        'matiere_id',
        'etablissement_id',
        'contact',
        'email',
        'genre',
        'datenaiss',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Liste des administrateurs de chaque école
    public function administrateur()
    {
        $administrateurs = DB::table('users AS u')
            ->join('etablissements AS e', 'e.id', '=', 'u.etablissement_id')
            ->where('u.role_id', '=', 3)
            ->select('u.id', 'u.nom','u.prenom','u.image', 'u.contact', 'e.nometablissement','u.etablissement_id','u.email','u.username','u.password')
            ->get();

        return $administrateurs;
    }

    //Liste des professeurs de chaque école
    public function listeprofesseurparecole()
    {
        $ecoleId = auth()->user()->etablissement_id;

        $professeurs = DB::table('users AS u')
            ->join('etablissements AS e', 'e.id', '=', 'u.etablissement_id')
            ->where('u.role_id', '=', 2)
            ->select('u.id', 'u.nom','u.prenom','u.image', 'u.contact', 'e.nometablissement','u.email','u.username','u.password','u.matiere_id','selected_classes',
            DB::raw('GROUP_CONCAT(DISTINCT (c.nomclasse)) as nomclasses'),
            DB::raw('GROUP_CONCAT(DISTINCT m.nommatiere) as nommatieres'))

            ->leftJoin('classes AS c', function ($join) {
                $join->whereRaw("JSON_CONTAINS(u.selected_classes, CONCAT('\"', c.id, '\"'))");
            })
            ->leftJoin('matieres AS m', function ($join) {
                $join->whereRaw("FIND_IN_SET(m.id, u.matiere_id)");
            })
            ->where('u.etablissement_id', '=', $ecoleId)
            ->groupBy('u.id', 'u.nom', 'u.prenom', 'u.image', 'u.contact')
            ->get();

        return $professeurs;
    }

    //Liste des professeurs de chaque école
    public function listeetudiantparecole()
    {
        $ecoleId = auth()->user()->etablissement_id;

        $etudiants = DB::table('users AS u')
            ->join('etablissements AS e', 'e.id', '=', 'u.etablissement_id')
            ->where('u.role_id', '=', 1)
            ->where('u.etablissement_id', '=', $ecoleId)
            ->select('u.id', 'u.nom','u.prenom','u.image', 'u.contact', 'e.nometablissement','u.email','u.username','u.password')
            ->get();

        return $etudiants;
    }
}
