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
}