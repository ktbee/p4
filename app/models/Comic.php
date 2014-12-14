<?php

class Comic extends Eloquent {

	public function user() {
        # Comic belongs to User
        return $this->belongsTo('User');
    }

    public function tag() {

        return $this->belongsToMany('Tag');
    }

}