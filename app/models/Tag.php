<?php

class Tag extends Eloquent {

	public function comic() {

        return $this->belongsToMany('Comic');
    }

     public static function getIdNamePair() {
        $tags = Array();
        $collection = Tag::all();
        foreach($collection as $tag) {
            $tags[$tag->id] = $tag->name;
        }
        return $tags;
    }
    
    public static function boot() {
        parent::boot();
        static::deleting(function($tag) {
            DB::statement('DELETE FROM comic_tag WHERE tag_id = ?', array($tag->id));
        });
	}
}
