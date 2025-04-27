<x-app-layout>
    @if ($verification->status === 'pending')
        <div class="alert alert-info">
            Data Anda sedang dalam proses verifikasi. Harap tunggu hingga 1x24 jam.
        </div>
    @elseif ($verification->status === 'approved')
        <div class="alert alert-success">
            Verifikasi Anda disetujui. Anda sekarang dapat membuat kampanye.
        </div>
    @elseif ($verification->status === 'rejected')
        <div class="alert alert-danger">
            Verifikasi Anda ditolak. Anda dapat mengajukan ulang.
            <a href="{{ route('identity_verifications.reapply') }}" class="btn-primary">Ajukan Ulang</a>
        </div>
    @endif
</x-app-layout>
