<x-app-layout>
    <p>Silakan ajukan kembali verifikasi identitas Anda setelah melakukan perbaikan.</p>
    <form action="{{ route('identity_verifications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Formulir pengajuan ulang sama dengan yang pertama -->
    </form>
</x-app-layout>
