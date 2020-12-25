<?php

namespace App\Models;

use Hamcrest\Core\IsNot;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAvailable($pages)
    {
        // return self::whereHas('roles', function ($query) {
        //     return $query->where('role_id', '!=', 2);
        // })->paginate($pages);
        $admins = DB::table('role_user')->where('role_id', '=', 2)->get()->pluck('user_id')->toArray();
        return self::whereNotIn('id', $admins)->paginate($pages);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        $roles = $this->roles->pluck('title')->toArray();
        return in_array('admin', $roles);
    }
}
