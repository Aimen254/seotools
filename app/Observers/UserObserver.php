<?php

namespace App\Observers;

use App\Models\User;
use App\Traits\WebhookTrait;

class UserObserver
{
    use WebhookTrait;

    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $this->callWebhook(config('settings.webhook_user_created'), [
            'id' => $user->id,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'name' => $user->name,
            'action' => 'created'
        ]);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $this->callWebhook(config('settings.webhook_user_updated'), [
            'id' => $user->id,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'name' => $user->name,
            'action' => 'updated'
        ]);
    }

    /**
     * Handle the User "forceDeleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        $this->callWebhook(config('settings.webhook_user_deleted'), [
            'id' => $user->id,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'name' => $user->name,
            'action' => 'deleted'
        ]);
    }

    /**
     * Handle the User "deleting" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleting(User $user)
    {
        if ($user->isForceDeleting()) {
            $user->reports()->forceDelete();

            // If the user previously had a subscription, attempt to cancel it
            if ($user->plan_subscription_id) {
                $user->planSubscriptionCancel();
            }

            $user->reports()->delete();
        } else {
            // If the user previously had a subscription, attempt to cancel it
            if ($user->plan_subscription_id) {
                $user->planSubscriptionCancel();
            }
        }
    }
}
