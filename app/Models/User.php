<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
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
        'name',
        'email',
        'password',
        'is_admin',

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
        'password' => 'hashed',
    ];

    public function getSingle($id)
    {
        return self::find($id);
    }

    static public function getSingleDataId($id)
    {

        $id = decrypt($id);
        return User::find($id);
    }

    static public function getSingleData($id)
    {
        $id = decrypt($id);
        return User::find($id);
    }

    static public function getRecord()
    {
        return User::select('users.*')
            ->where('user_type', 0)
            ->where('is_delete', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
    }


    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function getCreatedAtFormattedAttribute()
    {
        return $this->created_at->format('d/m/Y H:i');
    }
}
