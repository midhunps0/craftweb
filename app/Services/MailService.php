<?php
namespace App\Services;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public function contactMail($data)
    {
        Mail::to(env('MAIL_CONTACT_RECEIVER'))->send(new ContactMail(
            $data['name'],
            $data['email'],
            $data['message'],
        ));

        return true;
    }
}
?>
