<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $appends  = ['time_ago'];
    protected $fillable = ['comment', 'user_id', 'media_id'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function getTimeAgoAttribute()
    {
    	return \Carbon\Carbon::parse($this->created_at)->diffForHumans();
    }
    
}
