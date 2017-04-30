<?php

namespace App;

interface Transaction
{

    public function date();

    public function amount();

    public function description();

    public function id();

}
