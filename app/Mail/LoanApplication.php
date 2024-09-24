<?php

namespace App\Mail;

use App\Traits\SMSTrait;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoanApplication extends Mailable
{
    use Queueable, SerializesModels, SMSTrait;

    public $data, $files, $sms;

    /**
     * Create a new message instance.
     *
     * @param  array  $data
     * @param  array  $files
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
        $this->files = [
            [
                'file_path' => public_path('forms/preapproval-mfs.docx'),
                'file_name' => 'MFS -  Pre-approval Form.docx',
                'file_mime' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            ],
            [
                'file_path' => public_path('forms/letter-of-introduction-mfs.docx'),
                'file_name' => 'MRS - Letter of Introduction.pdf',
                'file_mime' => 'application/pdf'
            ],
        ];

        $this->sms = [
            'message' => 'Hello '.auth()->user()->fname.', Thank you for applying. Please check your email for futher instructions in order to complete the loan request.',
            'phone'   =>  '26'.auth()->user()->phone
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // Send SMS
        $this->send_sms($this->sms);

        // Send Email
        $message = $this->view('email.loan-email');
        foreach ($this->files as $file) {
            $message->attach($file['file_path'], [
                'as' => $file['file_name'],
                'mime' => $file['file_mime'],
            ]);
        }
        return $message;
    }
}
