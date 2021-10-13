<?php

namespace App\Mail;

use App\Models\Test;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestCompleted extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Test
     */
    public $test;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Test $test)
    {
        //
        $this->test = $test;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject("Výsledok laboratórneho vyšetrenia COVID-19 ({$this->test->code_ref})")
            ->view('emails.test.completed')
            ->text('emails.test.completed_plain');
    }
}
