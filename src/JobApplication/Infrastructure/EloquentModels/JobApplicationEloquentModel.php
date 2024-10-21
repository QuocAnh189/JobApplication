<?php

namespace Src\JobApplication\Infrastructure\EloquentModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Src\Job\Infrastructure\EloquentModels\JobEloquentModel;
use Src\User\Infrastructure\EloquentModels\UserEloquentModel;
use Illuminate\Support\Str;

/**
 *
 *
 * @property int $id
 * @property int $user_id
 * @property int $job_id
 * @property int $expected_salary
 * @property string|null $cv_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Job $job
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\JobApplicationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication query()
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication whereCvPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication whereExpectedSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JobApplication whereUserId($value)
 * @mixin \Eloquent
 */
class JobApplicationEloquentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'job_applications';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = ['expected_salary', 'user_id', 'job_id', 'cv_path'];


    public static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }

    public function job(): BelongsTo
    {
        return $this->belongsTo(JobEloquentModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserEloquentModel::class);
    }
}
