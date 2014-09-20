<?php
/**
 * Created by PhpStorm.
 * User: Sajid
 * Date: 9/17/14
 * Time: 9:53 PM
 */

class Customer extends Eloquent {

    public function registrations() {
        return $this->hasMany("Registration");
    }

} 