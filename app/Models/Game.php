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
        'title',
    ];
    
    /**
     * Get the details for this game
     */
    public function details()
    {
        return $this->hasOne(Game_Detail::class);
    }
    
    /**
     * Get the pricing for this game
     */
    public function pricing()
    {
        return $this->hasOne(Game_Pricing::class);
    }
    
    /**
     * Get the requirements for this game
     */
    public function requirements()
    {
        return $this->hasOne(Game_Requirement::class);
    }
    
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
        return $this->hasMany(Game_Credits_Mapping::class);
    }
    
    /**
     * Get the tags for this game
     */
    public function tags()
    {
        return $this->hasMany(Game_Tags_Mappings::class);
    }
}

class Game_Detail extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_details';
    
    /**
     * Get the game for trhese details
     */
    public function game()
    {
        return $this->hasOne(Game::class);
    }
}

class Game_Pricing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_pricing';
    
    /**
     * Get the game for this pricing
     */
    public function game()
    {
        return $this->hasOne(Game::class);
    }
}

class Game_Requirement extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_requirements';
    
    /**
     * Get the game for these requirements
     */
    public function game()
    {
        return $this->hasOne(Game::class);
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
    public function game() {
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
    public function game() {
        return $this->belongsTo(Game::class);
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
     * the credit definitions for this game
     */
    public function credits() {
        return $this->hasMany(Game_Credits_Definitions::class);
    }
    
    /**
     * the games for this credit
     */
    public function game() {
        return $this->hasMany(Game::class);
    }
}

class Game_Credits_Definitions extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_credits_definitions';
    
    /**
     * the credit mappings that reference this tag
     */
    public function credits() {
        return $this->belongsToMany(Game_Credits_Mapping::class, 'game_credits_mappings', 'id', 'credit_id');
    }
}

class Game_Tags_Mappings extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_tags_mappings';
    
    /**
     * the tag definitions for this game
     */
    public function tags() {
        return $this->hasMany(Game_Tags_Definitions::class);
    }
    
    /**
     * the games for this tag
     */
    public function game() {
        return $this->hasMany(Game::class);
    }
}

class Game_Tags_Definitions extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'game_tags_definitions';
    
    /**
     * the tag mappings that reference this tag
     */
    public function tags() {
        return $this->belongsToMany(Game_Tags_Mappings::class, 'game_tags_mappings', 'id', 'tag_id');
    }
}
