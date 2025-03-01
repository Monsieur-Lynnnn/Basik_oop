<?php

use Components\RestoDataTable;
use Models\Resto;

include_once './layouts/header.php';

if (isset ($_POST['action'])) {
    switch ($_POST['action']) {
        case 'addResto':
            Resto::create($_POST);
            break;

        case 'editResto':
            (new Resto)->query()
                ->where('id', '=', $_POST['id'])
                ->update($_POST);
            break;

        case 'deleteResto':
            (new Resto)->query()
                ->where('id', '=', $_POST['id'])
                ->delete();
            break;

        default:
            # code...
            break;
    }
}

?>

<div class="container">
    <div class="d-flex align-items-center justify-content-between mb-3">
        <h4 class="h4">
            Resto Data
        </h4>
        <a href="javascript:void(0)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            Tambah Data
        </a>
    </div>

    <div class="overflow-x-auto">
        <?= RestoDataTable::render(); ?>
    </div>

    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">
                        Tambah Data
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="post">
                    <input type="hidden" name="action" value="addRessto">

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">
                                Nama:
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="Lokasi" class="col-form-label">
                                Lokasi:
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="Lokasi"
                                name="Lokasi"
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="Bintang" class="col-form-label">
                                Bintang:
                                <span class="text-danger">*</span>
                            </label>

                            <select
                                name="Bintang"
                                id="Bintang"
                                class="form-control"
                                required
                            >
                                <option value="⭐">⭐</option>
                                <option value="⭐⭐">⭐⭐</option>
                                <option value="⭐⭐⭐">⭐⭐⭐</option>
                                <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
                                <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">
                        Edit 
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="post">
                    <input type="hidden" name="action" value="editResto" />
                    <input type="hidden" name="id" />

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Resto" class="col-form-label">
                                Resto:
                                <span class="text-danger">*</span>
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="Resto"
                                name=""
                                required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="Lokasi" class="col-form-label">
                                Lokasi
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                class="form-control"
                                id="Lokasi"
                                name=""
                                required
                            />

                        </div>
                        <div class="mb-3">
                            <label for="Bintang" class="col-form-label">
                                Bintang:
                                <span class="text-danger">*</span>
                            </label>

                            <select
                                name="Bintang"
                                id="Bintang"
                                class="form-control"
                                required
                            >
                                <option value="⭐">⭐</option>
                                <option value="⭐⭐">⭐⭐</option>
                                <option value="⭐⭐⭐">⭐⭐⭐</option>
                                <option value="⭐⭐⭐⭐">⭐⭐⭐⭐</option>
                                <option value="⭐⭐⭐⭐⭐">⭐⭐⭐⭐⭐</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">
                        Delete Data
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="" method="post">
                    <input type="hidden" name="action" value="deleteUser" />
                    <input type="hidden" name="id" />

                    <div class="modal-body">
                        Apakah Anda yakin ingin menghapus data ini?
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const setModalData = (data) => {
            const form = document.querySelector('#editModal form');

            for (const key in data) {
                if (Object.hasOwnProperty.call(data, key)) {
                    const element = data[key];
                    const input = form.querySelector(`input[name="${key}"]`);

                    if (input) {
                        input.value = element;
                    }
                }
            }
        }

        const setDeletionId = (id) => {
            const form = document.querySelector('#deleteModal form');
            const input = form.querySelector('input[name="id"]');

            input.value = id;
        }
    </script>
</div>

<?php include_once './layouts/footer.php'; ?>