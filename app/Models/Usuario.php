<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Model
{
    use HasFactory;
    use Notifiable;

    /**
     * Los atributos que se pueden asignar en masa.
     *
     * @var array
     */

    protected $table = 'usuarios';

    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * Los atributos que deben ocultarse para arreglos.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Los atributos que se deben convertir a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
