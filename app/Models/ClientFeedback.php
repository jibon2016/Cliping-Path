<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientFeedback extends Model
{
    protected $guarded = [];

    protected $casts = [
        'date' => 'date'
    ];

    public function attachments()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }
}
