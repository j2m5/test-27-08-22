<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'message'];

    /**
     * Прослушиваем событие добавления ответа к вопросу и изменяем статус вопроса на Завершенный
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::created(function ($answer) {
            $answer->ticket->status = 1;
            $answer->ticket->save();
        });
    }

    /**
     * Создаем обратную связку от ответа к вопросу
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
