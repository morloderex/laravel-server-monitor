<?php

namespace Spatie\ServerMonitor\Notifications;

use Illuminate\Notifications\Notifiable as NotifiableTrait;

class Notifiable
{
    use NotifiableTrait;

    /** @var \Spatie\ServerMonitor\Events\Event */
    protected $event;

    public function routeNotificationForMail(): ?string
    {
        return config('server-monitor.notifications.mail.to');
    }

    public function routeNotificationForSlack(): ?string
    {
        return config('server-monitor.notifications.slack.webhook_url');
    }

    public function getKey(): string
    {
        return static::class;
    }

    /**
     * Get the event for the notification.
     *
     * @return \Spatie\ServerMonitor\Events\Event
     */
    public function getEvent(): \Spatie\ServerMonitor\Events\Event
    {
        return $this->event;
    }

    /**
     * Set the event for the notification.
     *
     * @param \Spatie\ServerMonitor\Events\Event $event
     *
     * @return Notifiable
     */
    public function setEvent(\Spatie\ServerMonitor\Events\Event $event): Notifiable
    {
        $this->event = $event;

        return $this;
    }
}
