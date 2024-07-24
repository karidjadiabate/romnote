<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeInscription extends Model
{
    use HasFactory;

    protected $fillable = ['prenom','nom','contact','email','nometablissement','adresseetablissement','password','password_confirm'];
}
