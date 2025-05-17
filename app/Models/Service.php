<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable')
            ->orderBy('sort');
    }

}
