<?php

namespace Src\Job\Infrastructure\EloquentModels;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Src\Employer\Infrastructure\EloquentModels\EmployerEloquentModel;
use Src\JobApplication\Infrastructure\EloquentModels\JobApplicationEloquentModel;
use Illuminate\Support\Str;

/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $salary
 * @property string $location
 * @property string $category
 * @property string $experience
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int $employer_id
 * @property-read \App\Models\Employer $employer
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\JobApplication> $jobApplications
 * @property-read int|null $job_applications_count
 * @method static \Database\Factories\JobFactory factory($count = null, $state = [])
 * @method static EloquentBuilder|Job filter(array $filters)
 * @method static EloquentBuilder|Job newModelQuery()
 * @method static EloquentBuilder|Job newQuery()
 * @method static EloquentBuilder|Job onlyTrashed()
 * @method static EloquentBuilder|Job query()
 * @method static EloquentBuilder|Job whereCategory($value)
 * @method static EloquentBuilder|Job whereCreatedAt($value)
 * @method static EloquentBuilder|Job whereDeletedAt($value)
 * @method static EloquentBuilder|Job whereDescription($value)
 * @method static EloquentBuilder|Job whereEmployerId($value)
 * @method static EloquentBuilder|Job whereExperience($value)
 * @method static EloquentBuilder|Job whereId($value)
 * @method static EloquentBuilder|Job whereLocation($value)
 * @method static EloquentBuilder|Job whereSalary($value)
 * @method static EloquentBuilder|Job whereTitle($value)
 * @method static EloquentBuilder|Job whereUpdatedAt($value)
 * @method static EloquentBuilder|Job withTrashed()
 * @method static EloquentBuilder|Job withoutTrashed()
 * @mixin \Eloquent
 */
class JobEloquentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jobs';

    public $incrementing = false;

    protected $keyType = 'string';


    protected $fillable = [
        'title',
        'location',
        'salary',
        'description',
        'experience',
        'category'
    ];

    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public static array $experiences = ['entry', 'intermediate', 'senior'];
    public static array $categories = ['IT', 'Finance', 'Sales', 'Marketing'];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(EmployerEloquentModel::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplicationEloquentModel::class);
    }
}
