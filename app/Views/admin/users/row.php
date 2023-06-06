<tr>
    <td><?= $row->id; ?></td>
    <td><?= $row->username; ?></td>
    <td><?= empty($group) ? '' : $group[0]['name']; ?></td>
    <td><?= $row->email; ?></td>
    <td align="center">
        <a href="#" class="btn btn-sm btn-circle btn-active-users" data-id="<?= $row->id; ?>" data-active="<?= $row->active == 1 ? 1 : 0; ?>" title="Klik untuk Mengaktifkan atau Menonaktifkan">
            <?= $row->active == 1 ? '<i class="fas fa-check-circle"></i>' : '<i class="fas fa-times-circle"></i>'; ?>
        </a>
    </td>
    <td align="center">
        <a href="<?= base_url(); ?>/users/changePassword/<?= $row->id; ?>" class="btn btn-warning btn-circle btn-sm" title="Ubah Password">
            <i class="fas fa-key"></i>
        </a>
        <a href="#" class="btn btn-success btn-circle btn-sm btn-change-group" data-id="<?= $row->id; ?>" title="Ubah Grup">
            <i class="fas fa-tasks"></i>
        </a>
    </td>
</tr>