<x-app-layout>
    <form action="{{ route('identity_verifications.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
            <input type="text" name="full_name" placeholder="Nama Lengkap" required class="form-input" />
            <input type="email" name="email" placeholder="Email" required class="form-input" />
            <input type="text" name="phone_number" placeholder="Nomor HP" required class="form-input" />
            <input type="text" name="bank_account_number" placeholder="Nomor Rekening" required class="form-input" />
            <input type="text" name="ktp_number" placeholder="Nomor KTP" required class="form-input" />
            <input type="file" name="photo" required class="form-input" />
            <button type="submit" class="btn-primary">Ajukan Verifikasi</button>
        </div>
    </form>
</x-app-layout>
