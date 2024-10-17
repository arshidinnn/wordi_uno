<?php

namespace App\Models;

use App\Enums\TaskTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;



/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property TaskTypes $type
 * @property string $mode
 * @property int|null $group_id
 * @property int|null $user_id
 * @property int $teacher_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Setting|null $setting
 * @method static \Illuminate\Database\Eloquent\Builder|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereTeacherId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Task whereUserId($value)
 * @property-read \App\Models\Group|null $group
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\Mode $withMode
 * @mixin \Eloquent
 */
class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'subject',
        'mode',
        'user_id',
        'group_id',
        'teacher_id'
    ];

    protected $casts = [
        'type' => TaskTypes::class,

    ];

    public function setting(): HasOne
    {
        return $this->hasOne(Setting::class);
    }

    public function withMode(): BelongsTo
    {
        return $this->belongsTo(Mode::class, 'mode', 'name');
    }


    public static function getStudentTasks(User $student)
    {
        return self::query()->where('user_id', $student->id)
            ->orWhere('group_id', $student->group_id)
            ->with('withMode')
            ->get();
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
