<?php

namespace Application\Email;

use Application\Email\EmailTemplate;

interface EmailSender
{
    /**
     * Send a single email message to given recipient
     *
     * @param Recipient     $recipient
     * @param EmailTemplate $emailTemplate
     * @param array         $context context array, the same as with twig templates
     * @param array         $options
     *
     * @return int number of sent emails
     */
    public function sendMessage(Recipient $recipient, EmailTemplate $emailTemplate, $context, $options = array());
}
