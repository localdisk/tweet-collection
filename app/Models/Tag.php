<?php

declare(strict_types=1);

namespace App\Models;

use Ausi\SlugGenerator\SlugGenerator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use InvalidArgumentException;

/**
 * App\Models\Tag.
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tweet[] $tweets
 * @property-read int|null $tweets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    /** @var array */
    protected $fillable = ['name', 'slug'];

    /**
     * tweets.
     *
     * @return BelongsToMany
     */
    public function tweets(): BelongsToMany
    {
        return $this->belongsToMany(Tweet::class);
    }

    /**
     * set slug attribute.
     *
     * @param string $slug
     * @return void
     * @throws InvalidArgumentException
     */
    public function setSlugAttribute(string $slug)
    {
        $generator = new SlugGenerator();
        $this->attributes['slug'] = $generator->generate($slug);
    }
}
