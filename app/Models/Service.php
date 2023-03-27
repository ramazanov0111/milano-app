<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

/**
 * Услуги
 *
 * Class Service
 * @package App\Models
 *
 * @property int id
 * @property string title - Название
 * @property string slug - Ссылка
 * @property int image_id - Изображение
 * @property int category_id - Категория
 * @property string|null unit - Единица измерения
 * @property int|null price - Цена за 1 единицу
 * @property string|null description - Описание
 * @property boolean published - Статус публикации
 * @property string|null meta_title
 * @property string|null meta_description
 * @property string|null meta_keywords
 * @property Carbon|null created_at - Дата создания
 * @property Carbon|null updated_at - Дата обновления
 *
 * @property-read Category $category
 * @property-read Media|null $image
 * @property-read Media|null $gallery
 *
 */
class Service extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    public const TABLE = 'services';

    /** @var string */
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'slug',
        'image_id',
        'category_id',
        'unit',
        'price',
        'description',
        'published',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'image_id' => 'integer',
        'category_id' => 'integer',
        'unit' => 'string',
        'price' => 'integer',
        'description' => 'string',
        'published' => 'boolean',
        'meta_title' => 'string',
        'meta_description' => 'string',
        'meta_keywords' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Media::class, 'image_id', 'id');
    }

    /**
     * @return BelongsToMany
     */
    public function gallery(): BelongsToMany
    {
        return $this->belongsToMany(Media::class);
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /**
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeLastServices($query, $count)
    {
        return $query
            ->where('published', 1)
            ->orderBy('created_at', 'desc')->take($count)->get();
    }

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }
}
