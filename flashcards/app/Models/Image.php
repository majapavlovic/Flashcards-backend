<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ["name", "file_path", "description", "created_at", "updated_at"];

    public function question() {
        return $this->hasOne(Question::class);
    }
    public function answer() {
        return $this->hasOne(Answer::class);
    }
}
