<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function posts()
    {
        return $this->hasMany(Post::class);
    }

     public function publish(Post $post)
    {

       if(request()->hasFile('img_path')) {
            $file = request()->file('img_path');
            $file->move(public_path() . '/images/'.$this->id,'filename.jpg');
        }
        $post->img_path ='/images/'.$this->id.'/filename.jpg';
        $this->posts()->save($post);
    }
}
