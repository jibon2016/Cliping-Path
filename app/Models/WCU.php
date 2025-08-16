<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WCU extends Model
{
    //
    protected $guarded = [];
    protected $table = 'wcu';

    public function attachments()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }
}
