<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'date',
        'amount',
        'description',
    ];

    public function date()
    {
        return $this['date'];
    }

    public function amount()
    {
        return $this['amount'];
    }

    public function description()
    {
        return $this['description'];
    }

    public function record()
    {
        return $this->morphTo();
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
