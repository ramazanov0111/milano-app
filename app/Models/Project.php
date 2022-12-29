<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

/**
 * Проекты
 *
 * Class Project
 * @package App\Models
 *
 * @property int id
 * @property string title - Название
 * @property string slug - Ссылка
 * @property int image_id - Изображение
 * @property int category_id - Категория
 * @property string|null responsible
 * @property string|null consumer - Заказчик
 * @property string|null description - Комментарий
 * @property string|null completed_work - Срок сдачи
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
class Project extends Model
{
    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
    public const TABLE = 'projects';

    /** @var string */
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'slug',
        'image_id',
        'category_id',
        'responsible',
        'consumer',
        'description',
        'completed_work',
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
        'responsible' => 'string',
        'consumer' => 'string',
        'description' => 'string',
        'completed_work' => 'string',
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
        return $this->belongsToMany(Media::class, 'project_image', 'project_id', 'image_id');
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
    public function scopeLastProjects($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
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
