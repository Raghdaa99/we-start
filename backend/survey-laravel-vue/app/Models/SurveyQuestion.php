<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'question', 'description', 'options', 'survey_id'];
    protected $table = 'survey_questions';

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}
