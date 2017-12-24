<?php

namespace App;

use App\Comment;
use App\Likes;
use App\Dislikes;
use App\Word;
use Carbon\Carbon;
class Post extends Model
{
    public function comment()
    {
    	return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
    	Comment::create([
    		"body"=>$body,
    		"post_id"=>$this->id
    	]);
    }


    public function scopeFilter($query ,$filters)
    {
        if($month = $filters['month']){
            $query -> whereMonth('created_at' , Carbon::parse($month)->month);
        }

        if($year = $filters['year']){
            $query -> whereYear('created_at' , $year);
        }   
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*)')
            ->groupBy('year' , 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();  
    }

    public function likes()
    {
       return $this->morphMany(Likes::class , 'likes');
    }

    public function like()
    {
        $attributes = ['user_id' => auth()->id()];
        if (! $this->likes()->where($attributes)->exists()) {

            if ($this->dislikes()->where($attributes)->exists()) {

            $this->dislikes()->where($attributes)->delete();
            
            }
            
            return $this->likes()->create($attributes);
            
        }
    }

    public function isLiked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }

    public function dislikes()
    {
       return $this->morphMany(Dislikes::class , 'dislikes');
    }

    public function dislike()
    {
        $attributes = ['user_id' => auth()->id()];

        if (! $this->dislikes()->where($attributes)->exists()) {

            if ($this->likes()->where($attributes)->exists()) {

                $this->likes()->where($attributes)->delete();
            }

            return $this->dislikes()->create($attributes);
            
        }
    }

    public function isDisliked()
    {
        return $this->dislikes()->where('user_id', auth()->id())->exists();
    }

    public function firstLiked()
    {
        if($this->likes()->count() > 0){
            $user = User::find($this->likes()->first()->user_id);
            return $user;  
        }
        
    }

    public function replace($string, $pos, $char, $encoding = "UTF-8")
    {
        return mb_substr($string, 0, $pos, $encoding)
        .$char
        .mb_substr($string, $pos+1, NULL, $encoding);  
    }

    public function getFilterWords()
    {   
        $words = \DB::table('words')->get();
        $filterWords = [];
        $i=0;
        foreach ($words as $word) {
            $filterWords[$i] = $word->body;
            $i++;
        }
        return $filterWords;

    }


    public function bodyFilter()
    {
       $filterWords = $this->getFilterWords();
        $body = $this->body;
        foreach ($filterWords as $words) {
            $replacing = $words;

            for ($i = 1; $i < mb_strlen($replacing)-1; $i++){
                $replacing = $this->replace($replacing, $i, "*");
            }

            if(str_contains($body, $words))
              $body = str_ireplace($words, $replacing, $body);
        }

        return $body;
    }

}
