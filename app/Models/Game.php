<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'games';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'steam_id',
        'gog_id',
        'epic_id',
        'type',
        'banned',
        'title',
        'parent_game_id',
        'description',
        'about',
        'short_about',
        'languages',
        'notes',
        'release_date',
        'release_date_f',
        'coming_soon',
        'steam_url',
        'gog_url',
        'epic_url',
        'metacritic',
        'metacritic_url',
        'recommendations',
        'is_free',
        'current_steam_price',
        'current_gog_price',
        'current_epic_price',
        'best_price',
        'best_store',
        'windows',
        'pc_recommended',
        'pc_minimum',
        'linux',
        'linux_recommended',
        'linux_minimum',
        'mac',
        'mac_recommended',
        'mac_minimum',
    ];

    /**
     * Get the videos for this game
     */
    public function videos()
    {
        return $this->hasMany(Game_Videos::class);
    }

    /**
     * Get the images for this game
     */
    public function images()
    {
        return $this->hasMany(Game_Images::class);
    }

    /**
     * Get the credits for this game
     */
    public function credits()
    {
        return $this->hasManyThrough(
            Game_Credits_Definition::class,
            Game_Credits_Mapping::class,
            'credit_id', //mapping credit_id
            'id',        //credit id on credit definitions table
            'id',        //game id on games table
            'game_id'    //mapping game_id
        );
    }

    /**
     * Get the tags for this game
     */
    public function tags()
    {
        return $this->hasManyThrough(
            Game_Tags_Definition::class,
            Game_Tags_Mapping::class,
            'tag_id',
            'id',
            'id',
            'game_id'
        );
    }

    /**
     * Get the credit mappings for this game
     */
    public function credits_mappings()
    {
        return $this->hasMany(
            Game_Credits_Mapping::class,
            'game_id',   //mapping game_id
            'id'         //game id on games table
        );
    }

    /**
     * Get the tag mappings for this game
     */
    public function tags_mappings()
    {
        return $this->hasMany(
            Game_Tags_Mapping::class,
            'game_id',
            'id'
        );
    }
}

class Game_Videos extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_videos';

    /**
     * the game that uses this video
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}

class Game_Images extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_images';

    /**
     * the the game that uses this image
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}

class Game_Credits_Definition extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_credits_definitions';

    /**
     * the games that reference this tag
     */
    public function games()
    {
        return $this->hasManyThrough(
            Game::class,
            Game_Credits_Mapping::class,
            'game_id',
            'id',
            'id',
            'credit_id'
        );
    }
}

class Game_Tags_Definition extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_tags_definitions';

    /**
     * the games that reference this tag
     */
    public function games()
    {
        return $this->hasManyThrough(
            Game::class,
            Game_Tags_Mappings::class,
            'game_id',
            'id',
            'id',
            'tag_id'
        );
    }
}

class Game_Credits_Mapping extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_credits_mappings';

    /**
     * the credits that reference this mapping
     */
    public function credits() {
        return $this->belongsTo(Game_Credits_Definition::class);
    }

    /**
     * the games that reference this mapping
     */
    public function games() {
        return $this->belongsTo(Game::class);
    }
}

class Game_Tags_Mapping extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_tags_mappings';

    /**
     * the tags that reference this mapping
     */
    public function tags() {
        return $this->belongsTo(Game_Tags_Definition::class);
    }

    /**
     * the games that reference this mapping
     */
    public function games() {
        return $this->belongsTo(Game::class);
    }
}
