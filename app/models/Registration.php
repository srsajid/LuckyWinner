<?php
class Registration extends Eloquent {
    public $timestamps = false;

    public function customer() {
        return $this->belongsTo("Customer");
    }
}