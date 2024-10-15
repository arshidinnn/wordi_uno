<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\File;


/**
 * 
 *
 * @property int $id
 * @property int $task_id
 * @property string|null $number_range
 * @property bool $show_corrected_answer
 * @property \Illuminate\Support\Carbon|null $deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $timers_enabled
 * @property string|null $timer_type
 * @property int|null $timer_value
 * @property int|null $question_count
 * @property-read \App\Models\Task|null $task
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereNumberRange($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereQuestionCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereShowCorrectedAnswer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTaskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTimerType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTimerValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereTimersEnabled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'number_range',
        'iteration_timer',
        'overall_timer',
        'show_corrected_answer',
        'deadline',
        'question_count'
    ];

    protected $casts = [
        'show_corrected_answer' => 'boolean',
        'deadline' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function task(): HasOne
    {
        return $this->hasOne(Task::class);
    }
}
