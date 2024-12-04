<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PengajuanBssMahasiswa extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     public $pengajuanBss;
    public function __construct($pengajuanBss)
    {
        $this->pengajuanBss = $pengajuanBss;
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengajuan Bss Mahasiswa',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pengajuan_bss_diajukan',
            with: [
                'nim' => $this->pengajuanBss->mahasiswa->nim,
                'nama' => $this->pengajuanBss->mahasiswa->user->name,
                'prodi' => $this->pengajuanBss->mahasiswa->prodi->nama,
                'tahunAkademik' => $this->pengajuanBss->tahunAjaran->tahun_ajaran,
                'semester' => $this->pengajuanBss->semester->semester,
                'alasan' => $this->pengajuanBss->alasan,
                'tanggalDiajukan' => $this->pengajuanBss->diajukan_pada,
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
