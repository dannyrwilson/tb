<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'post_type', 'user_id'];
    protected $dates    = ['created_at', 'updated_at'];
    protected $appends  = ['time_ago'];

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'DESC');
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getTimeAgoAttribute()
    {
    	return \Carbon\Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getContentAttribute($value)
    {
    	if($this->post_type == 'video') {
    		
    		preg_match_all("#(?<=v=|v\/|vi=|vi\/|youtu.be\/)[a-zA-Z0-9_-]{11}#", $value, $match);
				return isset($match[0][0]) ? 'https://www.youtube.com/embed/'.$match[0][0] : false;

    	}else{
    		return $value;
    	}
    }

}
