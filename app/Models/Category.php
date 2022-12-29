<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * Категории
 *
 * Class Category
 * @package App\Models
 *
 * @property int id
 * @property string title -
 * @property string slug -
 * @property int|null published -
 * @property int parent_id -
 * @property Carbon|null created_by - Дата создания
 * @property Carbon|null modified_by - Дата обновления
 *
 * @property-read Project|null $projects
 * @property-read Service|null $services
 * @property-read Category|null $children
 * @property-read int $scopeLastCategories
 *
 */
class Category extends Model
{
    public const TABLE = 'categories';

    /** @var string */
    protected $table = self::TABLE;

    protected $fillable = [
        'title',
        'slug',
        'parent_id',
        'published',
        'created_by',
        'modified_by'
    ];

    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'published' => 'integer',
        'parent_id' => 'integer',
        'created_by' => 'datetime',
        'modified_by' => 'datetime',
    ];

    /**
     * @return HasMany
     */
    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'category_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function services(): HasMany
    {
        return $this->hasMany(Service::class, 'category_id', 'id');
    }

    // Get children category
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    // Mutators
    public function setSlugAttribute($value): void
    {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40));
    }

    /**
     * @param $query
     * @param $count
     * @return mixed
     */
    public function scopeLastCategories($query, $count)
    {
        return $query->orderBy('created_at', 'desc')->take($count)->get();
    }
}
