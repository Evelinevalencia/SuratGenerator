<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class email extends Mailable
{
    use Queueable, SerializesModels;
    public $nama, $id_surat, $email, $jenis, $tgl, $receiver, $isi, $ttd, $ttders;

    /**
     * Create a new message instance.
     */
    public function __construct($nama, $id_surat, $email, $jenis, $tgl, $receiver, $isi, $ttd, $ttders)
    {
        //
        $this->nama = $nama;
        $this->id_surat = $id_surat;
        $this->email = $email;
        $this->jenis = $jenis;
        $this->tgl = $tgl;
        $this->receiver = $receiver;
        $this->isi = $isi;
        $this->ttd = $ttd;
        $this->ttders = $ttders;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Matana University Administration',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Yoyo.email',
            with: ['nama' => $this->nama, 
            'id_surat' => $this->id_surat, 
            'email' => $this->email, 
            'jenis' => $this->jenis,
            'tgl' => $this->tgl,
            'receiver' => $this->receiver, 
            'isi' => $this->isi,
            'ttd' => $this->ttd,
            'ttders' => $this->ttders],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
