<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PromotionalEmail extends Model
{
    const STATUS_PENDING = 'PENDING';
    const STATUS_SENT = 'SENT';
    const STATUS_SCHEDULED = 'SCHEDULED';

    protected $fillable = [
        'subject',
        'message',
        'attachments',
        'recipients',
//        'cover_image',
        'sent_at',
        'status',
        'total_recipients'
    ];

    protected $casts = [
        'sent_at' => 'datetime',
    ];


    public function scheduleEmail($scheduledAt)
{
    $this->scheduled_at = Carbon::createFromFormat('Y-m-d H:i:s', $scheduledAt);
    $this->status = self::STATUS_SCHEDULED;
    $this->save();
}

}
