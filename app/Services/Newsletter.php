<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    /**
     * Create a new controller instance.
     * @param \MailchimpMarketing\ApiClient $client
     */
    public function __construct(protected ApiClient $client)
    {
        //
    }

    /**
     * Adds the given email to the subscription list.
     * @param string      $email
     * @param string|null $list
     * @return mixed
     */
    public function subscribe(string $email, string $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }
}
