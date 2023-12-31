<?= view('/layout/header') ?>
<div class="container mx-auto">
  <h1 class="text-2xl font-bold mb-4">Data Karyawan</h1>

  <div class="overflow-x-auto">
    <?php if ($notif = session()->getFlashdata('success')) : ?>
      <div class="bg-green-200 p-4 mb-4 border-l-4 border-green-500">
        <div class="flex">
          <div class="flex-shrink-0">
            <span class="iconify text-green-600" data-icon="mdi-check"></span>
          </div>
          <div class="ml-3">
            <p class="text-sm leading-5 font-semibold text-green-800"><?= $notif['type'] ?></p>
            <p class="mt-1 text-sm leading-5 text-green-700"><?= $notif['message'] ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($notif = session()->getFlashdata('failed')) : ?>
      <div class="bg-red-200 p-4 mb-4 border-l-4 border-red-500">
        <div class="flex">
          <div class="flex-shrink-0">
            <span class="iconify text-red-600" data-icon="mdi-alert-circle"></span>
          </div>
          <div class="ml-3">
            <p class="text-sm leading-5 font-semibold text-red-800"><?= $notif['type'] ?></p>
            <p class="mt-1 text-sm leading-5 text-red-700"><?= $notif['message'] ?></p>
          </div>
        </div>
      </div>
    <?php endif; ?>
    <table class="min-w-full bg-white border border-gray-300">
      <thead>
        <tr>
          <th class="py-2 px-4 border-b">No.</th>
          <th class="py-2 px-4 border-b">Nama Karyawan</th>
          <th class="py-2 px-4 border-b">Jabatan</th>
          <th class="py-2 px-4 border-b">Gaji</th>
          <th class="py-2 px-4 border-b">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (count($rows) > 0) : ?>
          <?php foreach ($rows as $num => $row) : ?>
            <tr class="text-center">
              <td class="py-2 px-4 border-b"><?= $num += 1 ?></td>
              <td class="py-2 px-4 border-b"><?= $row->name ?></td>
              <td class="py-2 px-4 border-b"><?= $row->position ?></td>
              <td class="py-2 px-4 border-b text-right"><?= number_to_currency($row->salary, 'IDR', fraction: 2) ?></td>
              <td class=" flex justify-center py-2 px-4 border-b">
                <div class="mr-3 p-2">
                  <a href="<?= base_url("/edit/{$row->employee_id}") ?>" class="text-blue-500 hover:text-blue-700 mr-2">
                    <span class="iconify" data-icon="mdi-pencil"></span>
                  </a>
                </div>
                <div class="p-2">
                <form action="<?= base_url("/delete/{$row->employee_id}") ?>" method="post">
                  <input type="hidden" name="_method" value="delete">
                  <button type="submit" onclick="return confirm('apakah anda yakin ?')" class="text-red-500 hover:text-red-700">
                    <span class="iconify" data-icon="mdi-trash"></span>
                  </button>
                </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr class="text-center">
            <td colspan="4" class="py-2 px-4 border-b"><?= $message ?></td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div class="mt-4 ">
    <a href="<?= base_url("/new") ?>" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded flex items-center">
      <span class="iconify text-lg mr-2" data-icon="mdi-plus"></span>
      <span>Create</span>
    </a>
  </div>

</div>
<?= view('/layout/footer') ?>