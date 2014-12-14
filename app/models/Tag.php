<?php

class Tag extends Eloquent {

	public function comic() {

        return $this->belongsToMany('Comic');
    }

}