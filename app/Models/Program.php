<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded = [];

    public function programCategory()
    {
        return $this->belongsTo(ProgramCategory::class);
    }

    public function attachments()
    {
        return $this->morphMany(Attachment::class,'attachable')
            ->orderBy('sort');
    }
}
