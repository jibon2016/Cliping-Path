<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function activityCategory()
    {
        return $this->belongsTo(ActivityCategory::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class,'attachable')
            ->orderBy('sort');
    }
}
