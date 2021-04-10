<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    //funkcja tworzy link postu 
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    //funkcja zwraca nazwę pola po której wyszukujemy linkowanie
    public function getRouteKeyName(){
        return 'slug';
    }

    // funkcja przycina tekst, strip_tags ucina teksk z zachowaniem znaków HTML(np <b> <stong>)
    public function getExcerptAttribute(){
        return Str::limit(strip_tags($this->content), 30) ;
    }
    
}
