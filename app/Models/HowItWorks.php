<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HowItWorks extends Model
{
    protected $guarded = [];

    public function attachments()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }
}
