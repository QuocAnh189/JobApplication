<?php

namespace Src\User\Infrastructure\EloquentModels;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Src\Employer\Infrastructure\EloquentModels\EmployerEloquentModel;
use Src\JobApplication\Infrastructure\EloquentModels\JobApplicationEloquentModel;
use Illuminate\Support\Str;

class UserEloquentModel extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $table = 'users';

    public $incrementing = false;

    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    protected static function newFactory()
    {
        return \Src\User\Infrastructure\Database\Factories\UserFactory::new();
    }

    public function employer(): HasOne
    {
        return $this->hasOne(EmployerEloquentModel::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplicationEloquentModel::class);
    }
}
