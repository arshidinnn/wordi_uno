<?php

namespace App\Models;

use App\Enums\SubjectTypes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * 
 *
 * @property string $name
 * @property SubjectTypes $subject
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Mode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mode query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mode whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mode whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Mode extends Model
{
    use HasFactory;

    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'subject',
    ];

    protected $casts = [
        'subject' => SubjectTypes::class
    ];
}
