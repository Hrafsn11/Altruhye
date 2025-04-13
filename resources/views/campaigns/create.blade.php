<x-app-layout>
<div class="max-w-2xl mx-auto py-6">
    @if(session('success'))
        <div class="bg-green-200 text-green-700 p-3 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('campaigns.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label>Judul</label>
            <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title') }}">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Deskripsi</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Tipe Bantuan</label>
            <select name="type" id="type" class="w-full border p-2 rounded" onchange="toggleFields(this.value)">
                <option value="">Pilih</option>
                <option value="financial">Finansial</option>
                <option value="goods">Barang</option>
                <option value="emotional">Dukungan Emosional</option>
            </select>
            @error('type') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div id="financial" class="target-field hidden">
            <label>Target Dana (Rp)</label>
            <input type="number" name="target_amount" class="w-full border p-2 rounded">
            @error('target_amount') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div id="goods" class="target-field hidden">
            <label>Target Barang (jumlah)</label>
            <input type="number" name="target_items" class="w-full border p-2 rounded">
            @error('target_items') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div id="emotional" class="target-field hidden">
            <label>Target Sesi Curhat</label>
            <input type="number" name="target_sessions" class="w-full border p-2 rounded">
            @error('target_sessions') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label>Gambar (opsional)</label>
            <input type="file" name="gambar" class="w-full border p-2 rounded">
            @error('gambar') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Ajukan Bantuan</button>
    </form>
</div>

<script>
function toggleFields(value) {
    document.querySelectorAll('.target-field').forEach(el => el.classList.add('hidden'));
    if (value) {
        document.getElementById(value).classList.remove('hidden');
    }
}
</script>
</x-app-layout>