<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengajuanBssNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;



    public $status;
    public $pengajuanBss;

    /**
     * Create a new message instance.
     */
    public function __construct($status, $pengajuanBss)
    {
        $this->status = $status;
        $this->pengajuanBss = $pengajuanBss;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $subject = $this->status == 'disetujui' ? 'Pemberitahuan Pengajuan BSS Disetujui' : 'Pemberitahuan Pengajuan BSS Ditolak';
        return new Envelope(
            subject: $subject,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {

        $view = $this->status == 'disetujui' ? 'emails.pengajuan_bss_disetujui' : 'emails.pengajuan_bss_ditolak';
        return new Content(
            view: $view,
            with: [
                'nim' => $this->pengajuanBss->mahasiswa->nim,
                'nama' => $this->pengajuanBss->mahasiswa->user->name,
                'prodi' => $this->pengajuanBss->mahasiswa->prodi->nama_prodi,
                'tahunAkademik' => $this->pengajuanBss->tahunAjaran->tahun_ajaran,
                'semester' => $this->pengajuanBss->semester->semester,
            ]
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
