
<html>
    <head>
        <title>Tabel Item</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <h1 class="text-2xl font-bold mb-5">Tabel Item Sielok</h1>

        <button onclick="toggle_modal()" class="bg-blue-500 text-white px-6 py-2 rounded-md">+Tambah Item</button>

        <table class="table-auto w-full mt-5">
            <thead>
                <tr class="bg-gray-300">
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $p)
                <tr>
                    <td class="border px-4 py-2">{{ $p->nama_barang }}</td>
                    <td class="border px-4 py-2">Rp.{{ number_format($p->harga, 0, ',', '.') }}</td>
                    <td class="border px-4 py-2">{{ $p->stok }}</td>
                    <td class="border px-4 py-2">{{ $p->deskripsi }}</td>
                    <td class="border px-4 py-2">
                        <div class="flex items-center justify-center gap-4">
                            <button type="button" onclick="toggle_edit(this)"
                                data-id="{{ $p->id }}"
                                data-nama="{{ $p->nama_barang }}"
                                data-harga="{{ $p->harga }}"
                                data-stok="{{ $p->stok }}"
                                data-deskripsi="{{ $p->deskripsi }}"
                                class="text-green-500 font-medium">
                                <span class="material-icons">edit</span>
                            </button>

                            <button type="button" onclick="if(confirm('Yakin ingin menghapus item ini?')) { document.getElementById('form-delete-{{ $p->id }}').submit(); }" class="text-red-500 font-medium">
                                <span class="material-icons">delete</span>
                            </button>

                            <form id="form-delete-{{ $p->id }}" action="{{ route('products.destroy', $p->id) }}" method="post" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{--modal tambah item--}}
        <div id="modal-tambah-item" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-6 rounded-2xl shadow-lg w-96">
                <h2 class="text-lg font-bold mb-4">Tambah Item Baru</h2>

                <form action="{{ route('products.store') }}" method="post">
                    @csrf
                    <!-- Form fields will go here -->
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" name="nama_barang" class="w-full border p-2 mb-3 rounded" required>

                    <label for="harga">Harga</label>
                    <input type="number" name="harga" class="w-full border p-2 mb-3 rounded" required>

                    <label for="stok">Stok</label>
                    <input type="number" name="stok" class="w-full border p-2 mb-3 rounded" required>

                    <label for="deskripsi" class="text-sm">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border p-2 mb-3 rounded" required></textarea>

                    <div class="flex justify-end gap-3 mt-2">
                        <button type="button" onclick="toggle_modal()" class="bg-gray-500 text-white px-4 py-2 rounded-md">Batal</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        {{--modal edit item--}}
        <div id="modal-edit-item" class="fixed inset-0 bg-gray-500 bg-opacity-50 hidden items-center justify-center">
            <div class="bg-white p-6 rounded-2xl shadow-lg w-96">
                <h2 class="text-lg font-bold mb-4">Edit Item</h2>

                <form id="form-edit-item" action="" method="post">
                    @csrf
                    @method('PUT')
                    <!-- Form fields will go here -->
                    <label for="edit_nama_barang">Nama Barang</label>
                    <input type="text" id="edit_nama_barang" name="nama_barang" class="w-full border p-2 mb-3 rounded" required>

                    <label for="edit_harga">Harga</label>
                    <input type="number" id="edit_harga" name="harga" class="w-full border p-2 mb-3 rounded" required>

                    <label for="edit_stok">Stok</label>
                    <input type="number" id="edit_stok" name="stok" class="w-full border p-2 mb-3 rounded" required>

                    <label for="edit_deskripsi" class="text-sm">Deskripsi</label>
                    <textarea id="edit_deskripsi" name="deskripsi" class="w-full border p-2 mb-3 rounded" required></textarea>

                    <div class="flex justify-end gap-3 mt-2">
                        <button type="button" onclick="toggle_edit_close()" class="bg-gray-500 text-white px-4 py-2 rounded-md">Batal</button>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            function toggle_modal() {
                const modal = document.getElementById('modal-tambah-item');
                modal.classList.toggle('hidden');
                modal.classList.toggle('flex');
            }

            function toggle_edit(button) {
                const modal = document.getElementById('modal-edit-item');

                const item = {
                    id: button.dataset.id,
                    nama_barang: button.dataset.nama,
                    harga: button.dataset.harga,
                    stok: button.dataset.stok,
                    deskripsi: button.dataset.deskripsi
                };

                document.getElementById('form-edit-item').action = "{{ url('/products') }}/" + item.id;

                document.getElementById('edit_nama_barang').value = item.nama_barang;
                document.getElementById('edit_harga').value = item.harga;
                document.getElementById('edit_stok').value = item.stok;
                document.getElementById('edit_deskripsi').value = item.deskripsi;

                modal.classList.remove('hidden');
                modal.classList.add('flex');
            }

            function toggle_edit_close() {
                const modal = document.getElementById('modal-edit-item');
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            }
        </script>
    </body>
</html>
