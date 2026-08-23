<?php

namespace App\Models;

use App\Contracts\Publisher;
use Illuminate\Database\Eloquent\Model;

class Podcast extends Model
{
    protected $fillable = [
        'name',
        'publishing',
    ];

    public function publish(Publisher $publisher): void
    {
        $this->update([
            'publishing' => now(),
        ]);

        $publisher->publish($this);
    }
}
