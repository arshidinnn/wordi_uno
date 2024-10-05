<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $value
 * @property string|null $sound
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Letter newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter query()
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereSound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Letter whereValue($value)
 * @mixin \Eloquent
 */
class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'image',
        'sound'
    ];
}
