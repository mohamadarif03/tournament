<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenTrialQuestion extends Model
{
    use HasFactory;
    public $incrementing = false;
    protected $fillable = ['question', 'open_trial_id'];
    protected $primaryKey = 'id';
    public $keyType = 'char';
    protected $table = 'open_trial_questions';
}
