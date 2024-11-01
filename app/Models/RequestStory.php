<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStory extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'q'
    ];

    public static function booted()
    {
        static::saved(function (RequestStory $request) {
            $requests = RequestStory::where('user_id', $request->user_id)->orderBy('created_at', 'desc')->skip(5)->get();
            $requests->each->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
