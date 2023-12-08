<?= view('/layout/header') ?>
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4"><?= $formTitle ?></h1>

    <form action="<?= $formAction ?>" method="<?= $formMethod ?>" class="p-8">
        <?php csrf_field() ?>
        <?php if ($row->employee_id) : ?>
            <input type="hidden" name="_method" value="put">
        <?php endif; ?>
        
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-600">Nama:</label>
            <input type="text" name="name" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan nama karyawan" value="<?= $row->name ?>">
        </div>

        <div class="mb-4">
            <label for="jabatan" class="block text-sm font-medium text-gray-600">Jabatan:</label>
            <input type="text" name="position" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan jabatan karyawan" value="<?= $row->position ?>">
        </div>

        <div class="mb-4">
            <label for="gaji" class="block text-sm font-medium text-gray-600">Gaji:</label>
            <input type="number" name="salary" class="mt-1 p-2 w-full border rounded-md" placeholder="Masukkan gaji karyawan" value="<?= $row->salary ?>">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center">
                <span class="iconify mr-2" data-icon="mdi-content-save"></span>Simpan
            </button>
        </div>
    </form>

</div>
<?= view('/layout/footer') ?>