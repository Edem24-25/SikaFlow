<?php

namespace App\Services;

use App\Models\User;
use App\Models\Notification;

class NotificationService
{
    public function push(User $user, string $type, string $titre, string $message, array $payload = []): Notification
    {
        return Notification::create([
            'user_id' => $user->id,
            'type' => $type,
            'titre' => $titre,
            'message' => $message,
            'payload' => $payload,
        ]);
    }
}
