<?php

namespace App;

use App\Comment;
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
}
