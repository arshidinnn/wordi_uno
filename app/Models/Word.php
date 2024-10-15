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
 * @property string|null $image
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Word newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Word newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Word query()
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereSound($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Word whereValue($value)
 * @mixin \Eloquent
 */
class Word extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'image',
        'sound'
    ];
}
