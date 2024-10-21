<?php

namespace Src\Employer\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Src\Job\Infrastructure\EloquentModels\JobEloquentModel;
use Src\User\Infrastructure\EloquentModels\UserEloquentModel;
use Illuminate\Support\Str;

/**
 *
 *
 * @property int $id
 * @property string $company_name
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Job> $jobs
 * @property-read int|null $jobs_count
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\EmployerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Employer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Employer whereUserId($value)
 * @mixin \Eloquent
 */
class EmployerEloquentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'employers';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['company_name'];

    protected static function newFactory()
    {
        return \Src\Employer\Infrastructure\Database\Factories\EmployerFactory::new();
    }

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(JobEloquentModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserEloquentModel::class);
    }
}
