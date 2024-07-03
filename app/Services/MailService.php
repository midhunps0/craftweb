<?php
namespace App\Services;

use Illuminate\Support\Facades\Mail;

class MailService
{
    public function contactMail($data)
    {
        $result = Mail::send('mails.contact',
            array(
                'name' => $data['name'],
                'email' => $data['email'],
                'user_message' => $data['message']
            ), function($message) use ($data)
        {
            $message->from('saquib.gt@gmail.com');
            $message->to('saquib.rizwan@cloudways.com', 'Admin')->subject('Cloudways Feedback');
            $message->replyTo($data['email'], $data['name']);
        });
        return isset($result);
    }
}
?>
