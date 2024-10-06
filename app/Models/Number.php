<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $value
 * @property string|null $sound
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Number newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Number newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Number query()
 * @method static \Illuminate\Database\Eloquent\Builder|Number whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Number whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Number whereSound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Number whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Number whereValue($value)
 * @mixin \Eloquent
 */
class Number extends Model
{
    use HasFactory;

    protected $fillable = [
        'value', 'sound'
    ];
}
