<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class MailTrap extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        return $this->view('admin.companies.register_mail',['name'=>$request->name,'email'=>$request->email,'website'=>$request->website,'address'=>$request->address])->from('ketandalsaniya05@gmail.com','KetAnk')->subject('New Company Registration');
        return $this->view('view.name');
    }
}
