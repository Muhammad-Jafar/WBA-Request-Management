function data_izin_edit_or_add_new() 
{
    sl_t = $('select[name="type"]'), sl_iz = $('select[name="id_namaizin"]');
    sl_t.change(function(event) {
        sl_iz.html($('<option></option>').text('-- Pilih --').attr({
            disabled: 'disabled',
            selected: 'selected'
        }));
        $.get(base_url + 'data_izin/dkebutuhan_ajax/' + sl_t.val(), function(data) {
            for (row in data) {
                sl_iz.append($('<option></option>').attr('value', data[row].id_kebutuhan).text(data[row].nama_kebutuhan));
            }
        });
    });
}

function data_keluhan_edit_or_add_new() 
{
    sl_t = $('select[name="type"]'), sl_iz = $('select[name="id_keluhan"]');
    sl_t.change(function(event) 
    {
        sl_iz.html($('<option></option>').text('-- Pilih --').attr(
        {
            disabled: 'disabled',
            selected: 'selected'
        }));

        $.get(base_url + 'data_keluhan/dkeluhan_ajax/' + sl_t.val(), function(data) 
        {
            for (row in data) 
            {
                sl_iz.append($('<option></option>').attr('value', data[row].id_keluhan).text(data[row].type));
            }
        });
    });
}

//AJAX KEBUTUHAN DATA PENGGUNA DI ADMIN
function data_mahasiswa_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/mahasiswa_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Avatar",
                data: 'avatar'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "NIM",
                data: 'nim'
            },
            {
                title: "Fakultas",
                data: 'nama_fakultas'
            },
            {
                title: "Prodi",
                data: 'nama_prodi'
            },
            {
                title: "Tempat Lahir",
                data: 'tempat_lahir'
            },
            {
                title: "Tanggal Lahir",
                data: 'tanggal_lahir'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Jabatan",
                data: 'nama_jabatan'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Registrasi",
                data: 'tanggal_regis'
            },
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         // html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}

function data_dosen_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/dosen_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Avatar",
                data: 'avatar'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "NIP / NIDN",
                data: 'nip'
            },
            {
                title: "Tempat Lahir",
                data: 'tempat_lahir'
            },
            {
                title: "Tanggal Lahir",
                data: 'tanggal_lahir'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Jabatan",
                data: 'nama_jabatan'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Registrasi",
                data: 'tanggal_regis'
            },
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}

function data_staff_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/staff_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Avatar",
                data: 'avatar'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "Tempat Lahir",
                data: 'tempat_lahir'
            },
            {
                title: "Tanggal Lahir",
                data: 'tanggal_lahir'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Jabatan",
                data: 'nama_jabatan'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Registrasi",
                data: 'tanggal_regis'
            },
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}
//ENDING DATA PENGGUNA DI ADMIN

//AJAX DATA PENGGUNA DI PENGGUNA 
function pengguna_kebutuhan_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'pengguna/KebutuhanPengguna_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Kebutuhan",
                data: 'type'
            },
            {
                title: "Permintaan",
                data: 'nama_kebutuhan'
            },
            {
                title: "Waktu Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Tanggal Mulai",
                data: 'tgl_mulai'
            },
            {
                title: "Tanggal Berakhir",
                data: 'tgl_akhir'
            },
            {
                title: "Durasi",
                data: 'lama_izin'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id'
            }
        ],
        createdRow: function(row, data, index) 
        {
            $('td', row).eq(0).html(index + 1);
            if (data['id']) {
                var type = data['type'],
                    id = data['id'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'pengguna/edit_kebutuhan/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'SK_KebutuhanCuti/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'SK_KebutuhanCuti/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'pengguna/delete_kebutuhan/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function pengguna_keluhan_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'pengguna/KeluhanPengguna_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Keluhan",
                data: 'type'
            },
            {
                title: "Keluhan",
                data: 'keluhan'
            },
            {
                title: "Waktu Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id'
            }
        ],
        createdRow: function(row, data, index) 
        {
            $('td', row).eq(0).html(index + 1);
            if (data['id_dkeluhan']) 
            {
                var  type = data['type'],
                     id   = data['id_dkeluhan'],
                html  = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'pengguna/edit_keluhan/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'pengguna/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}
//ENDING DATA PENGGUNA


function data_admin_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/admin_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Avatar",
                data: 'avatar'
            },
            {
                title: "Nama Lengkap",
                data: 'namalengkap'
            },
            {
                title: "Jabatan",
                data: 'type'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Action",
                data: 'id_user'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_user']) {
                var id = data['id_user'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/admin/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/admin/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_jabatan_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/jabatan_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Nama Jabatan",
                data: 'nama_jabatan'
            },
            {
                title: "Action",
                data: 'id_jabatan'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_jabatan']) {
                var id = data['id_jabatan'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/jabatan/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/jabatan/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_bidang_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/bidang_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Action",
                data: 'id_bidang'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_bidang']) {
                var id = data['id_bidang'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/bidang/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/bidang/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_namaizin_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/namaizin_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis kebutuhan",
                data: 'type'
            },
            {
                title: "Nama Kebutuhan",
                data: 'nama_kebutuhan'
            },
            {
                title: "Action",
                data: 'id_kebutuhan'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_nkebutuhan']) {
                var id = data['id_nkebutuhan'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/nama_izin/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/nama_izin/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_izin_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Kebutuhan",
                data: 'type'
            },
            {
                title: "Permintaan",
                data: 'nama_kebutuhan'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Status",
                data: 'nama_bidang'
            },
            {
                title: "Waktu Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Tanggal Mulai",
                data: 'tgl_mulai'
            },
            {
                title: "Tanggal Berakhir",
                data: 'tgl_akhir'
            },
            {
                title: "Durasi",
                data: 'lama_izin'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id_dkebutuhan'
            }
        ],
        createdRow: function(row, data, index) 
        {
            $('td', row).eq(0).html(index + 1);
            if (data['id_dkebutuhan']) {
                var type = data['type'],
                    id = data['id_dkebutuhan'],
                    html = '';
                // html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_izin/edit/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'SK_KebutuhanCuti/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'SK_KebutuhanCuti/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_izin/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function konfirmasi_izin_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'konfirmasi_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Kebutuhan",
                data: 'type'
            },
            {
                title:  "Permintaan",
                data: 'nama_kebutuhan'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "Status",
                data: 'nama_bidang'
            },
            {
                title: "Waktu Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Tanggal Mulai",
                data: 'tgl_mulai'
            },
            {
                title: "Tanggal Berakhir",
                data: 'tgl_akhir'
            },
            {
                title: "Durasi",
                data: 'lama_izin'
            },
            {
                title: "Action",
                data: 'id_dkebutuhan'
            }
        ],
        createdRow: function(row, data, index) 
        {
            $('td', row).eq(0).html(index + 1);
            if (data['id_dkebutuhan']) 
            {
                    id = data['id_dkebutuhan'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'konfirmasi_izin/accept/' + id + '\';" class="btn btn-success btn-icons btn-rounded"><i class="mdi mdi-check-circle"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'konfirmasi_izin/reject/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-close-circle-outline"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function data_keluhan_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_master/keluhan_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Keluhan",
                data: 'type'
            },
            {
                title: "Action",
                data: 'id_keluhan'
            }
        ],
        createdRow: function(row, data, index) 
        {
            $('td', row).eq(0).html(index + 1);
            if (data['id_keluhan']) 
            {
                var id = data['id_keluhan'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/keluhan/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/keluhan/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function daftar_keluhan_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'data_keluhan/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "Jenis Keluhan",
                data: 'type'
            },
            {
                title: "Keluhan",
                data: 'keluhan'
            },
            {
                title: "Status",
                data: 'nama_bidang'
            },
            {
                title: "Waktu Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id_dkeluhan'
            }
        ],
        createdRow: function(row, data, index) 
        {
            $('td', row).eq(0).html(index + 1);
            if (data['id_dkeluhan']) 
            {
                var  type = data['type'],
                     id   = data['id_dkeluhan'],
                html  = '';
                // html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_keluhan/edit/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'SK_Keluhan/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'SK_Keluhan/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_keluhan/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function konfirmasi_keluhan_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'konfirmasi_keluhan/keluhanlist_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Nama Pengaju",
                data: 'nama'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "Jenis Keluhan",
                data: 'type'
            },
            {
                title: "Keluhan",
                data: 'keluhan'
            },
           
            {
                title: "Status",
                data: 'nama_bidang'
            },
            {
                title: "Tanggal Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Action",
                data: 'id_dkeluhan'
            }
        ],
        createdRow: function(row, data, index) 
        {
            $('td', row).eq(0).html(index + 1);
            if (data['id_dkeluhan']) 
            {
                    id = data['id_dkeluhan'],
                    html = '';
                html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'konfirmasi_keluhan/accept/' + id + '\';" class="btn btn-success btn-icons btn-rounded"><i class="mdi mdi-check-circle"></i></button>';
                html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'konfirmasi_keluhan/reject/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-close-circle-outline"></i></button>';
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function daftar_izin_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'daftar_izin/list_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Type Izin",
                data: 'type'
            },
            {
                title: "Nama Izin",
                data: 'nama_izin'
            },
            {
                title: "Tempat",
                data: 'tempat'
            },
            {
                title: "Tanggal Awal",
                data: 'tglawal'
            },
            {
                title: "Tanggal Akhir",
                data: 'tglakhir'
            },
            {
                title: "Lama Izin",
                data: 'lama_izin'
            },
            {
                title: "Status",
                data: 'status'
            },
            {
                title: "Action",
                data: 'id_izin'
            }
        ],
        createdRow: function(row, data, index) {
            $('td', row).eq(0).html(index + 1);
            if (data['id_izin']) {
                var type = data['type'],
                    id = data['id_izin'],
                    html = '';
                if (data['n_status'] !== 'rejected') {
                    html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'daftar_izin/edit/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'daftar_izin/delete/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
                }
                if (data['n_status'] == 'approved') {
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '\';" class="btn btn-info btn-icons btn-rounded" title="Print surat"><i class="mdi mdi-printer"></i></button>';
                    html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'surat_keterangan/print/' + id + '?dl\';" class="btn btn-success btn-icons btn-rounded" title="Download file .doc"><i class="mdi mdi-download"></i></button>';
                }
                $('td', row).eq(-1).html(html);
            }
        }
    });
}

function daftar_izin_ajukan() 
{
    sl_t = $('select[name="type"]'), sl_iz = $('select[name="id_namaizin"]');
    sl_t.change(function(event) {
        sl_iz.html($('<option></option>').text('-- Pilih --').attr({
            disabled: 'disabled',
            selected: 'selected'
        }));
        $.get(base_url + 'daftar_izin/nama_izin_ajax/' + sl_t.val(), function(data) {
            for (row in data) {
                sl_iz.append($('<option></option>').attr('value', data[row].id_namaizin).text(data[row].nama_izin));
            }
        });
    });
}

//AJAX KEBUTUHAN DATA PENGGUNA DI LAPORAN
function data_kebutuhan_mahasiswa_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'laporan/kebutuhan_mahasiswa_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Kebutuhan",
                data: 'type'
            },
            {
                title: "Permintaan",
                data: 'nama_kebutuhan'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "NIM",
                data: 'nim'
            },
            {
                title: "Fakultas",
                data: 'nama_fakultas'
            },
            {
                title: "Prodi",
                data: 'nama_prodi'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Status",
                data: 'status'
            }
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ]
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         // html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}

function data_kebutuhan_dosen_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'laporan/kebutuhan_dosen_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Kebutuhan",
                data: 'type'
            },
            {
                title: "Permintaan",
                data: 'nama_kebutuhan'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "NIP / NIDN",
                data: 'nip'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Status",
                data: 'status'
            }
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}

function data_kebutuhan_staff_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'laporan/kebutuhan_staff_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Kebutuhan",
                data: 'type'
            },
            {
                title: "Permintaan",
                data: 'nama_kebutuhan'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Status",
                data: 'status'
            }
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}
//ENDING DATA PENGGUNA DI LAPORAN

//AJAX KEBUTUHAN DATA PENGGUNA DI KELUHAN
function data_keluhan_mahasiswa_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'laporan/keluhan_mahasiswa_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Keluhan",
                data: 'type'
            },
            {
                title: "Keluhan",
                data: 'keluhan'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "NIM",
                data: 'nim'
            },
            {
                title: "Fakultas",
                data: 'nama_fakultas'
            },
            {
                title: "Prodi",
                data: 'nama_prodi'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Status",
                data: 'status'
            }
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         // html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         // html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}

function data_keluhan_dosen_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'laporan/keluhan_dosen_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Keluhan",
                data: 'type'
            },
            {
                title: "Keluhan",
                data: 'keluhan'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "NIP / NIDN",
                data: 'nip'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Status",
                data: 'status'
            }
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}

function data_keluhan_staff_index() 
{
    $('table.data').DataTable({
        ajax: {
            url: base_url + 'laporan/keluhan_staff_ajax',
        },
        columns: [{
                title: "No.",
                data: 'no'
            },
            {
                title: "Jenis Keluhan",
                data: 'type'
            },
            {
                title: "Keluhan",
                data: 'keluhan'
            },
            {
                title: "Nomor Pegawai",
                data: 'np'
            },
            {
                title: "Nama Lengkap",
                data: 'nama'
            },
            {
                title: "Jenis Kelamin",
                data: 'jenis_kelamin'
            },
            {
                title: "Status Civitas",
                data: 'nama_bidang'
            },
            {
                title: "Alamat",
                data: 'alamat'
            },
            {
                title: "No. Handphone",
                data: 'no_handphone'
            },
            {
                title: "Email",
                data: 'email'
            },
            {
                title: "Tanggal Pengajuan",
                data: 'tgl_pengajuan'
            },
            {
                title: "Status",
                data: 'status'
            }
            // {
            //     title: "Action",
            //     data: 'id'
            // }
        ],
        // createdRow: function(row, data, index) {
        //     $('td', row).eq(0).html(index + 1);
        //     if (data['id']) {
        //         var id = data['id'],
        //             html = '';
        //         html += '<button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/edit/pegawai/' + id + '\';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>';
        //         html += ' <button type="button" onclick="javascript:top.location.href=\'' + base_url + 'data_master/delete/pegawai/' + id + '\';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>';
        //         $('td', row).eq(-1).html(html);
        //     }
        // }
    });
}
//ENDING DATA PENGGUNA DI LAPORAN


$(document).ready(function() 
{
    switch (true) 
    {
        case (window.location.href.indexOf('/data_master/admin') != -1): data_admin_index();
        break;
        case (window.location.href.indexOf('/data_master/jabatan') != -1): data_jabatan_index();
        break;
        case (window.location.href.indexOf('/data_master/bidang') != -1): data_bidang_index();
        break;
        case (window.location.href.indexOf('/data_master/pegawai/mahasiswa') != -1): data_mahasiswa_index();
        break;
        case (window.location.href.indexOf('/data_master/pegawai/dosen') != -1): data_dosen_index();
        break;
        case (window.location.href.indexOf('/data_master/pegawai/staff') != -1): data_staff_index();
        break;
        case (window.location.href.indexOf('/daftar_izin/ajukan') != -1 || window.location.href.indexOf('/daftar_izin/edit') != -1): daftar_izin_ajukan();
        break;
        case (window.location.href.indexOf('/daftar_izin') != -1): daftar_izin_index();
        break;
        case (window.location.href.indexOf('/data_master/nama_izin') != -1): data_namaizin_index();
        break;
        case (window.location.href.indexOf('/data_master/keluhan') != -1): data_keluhan_index();
        break;
        case (window.location.href.indexOf('/konfirmasi_izin') != -1): konfirmasi_izin_index();
        break;
        case (window.location.href.indexOf('/data_izin/edit') != -1 || window.location.href.indexOf('/data_izin/add_new') != -1): data_izin_edit_or_add_new();
        break;
        case (window.location.href.indexOf('/data_izin') != -1): data_izin_index();
        break;
        case (window.location.href.indexOf('/data_keluhan') != -1): daftar_keluhan_index();
        break;
        case (window.location.href.indexOf('/data_keluhan/edit') != -1 || window.location.href.indexOf('/data_keluhan/add_new') != -1): data_keluhan_edit_or_add_new();
        break;
        case (window.location.href.indexOf('/konfirmasi_keluhan') != -1): konfirmasi_keluhan_index();
        break;
        case (window.location.href.indexOf('/pengguna/kebutuhan') != -1): pengguna_kebutuhan_index();
        break;
        case (window.location.href.indexOf('/pengguna/keluhan') != -1): pengguna_keluhan_index();
        break;

        case (window.location.href.indexOf('/laporan/kebutuhan/mahasiswa') != -1): data_kebutuhan_mahasiswa_index();
        break;
        case (window.location.href.indexOf('/laporan/kebutuhan/dosen') != -1): data_kebutuhan_dosen_index();
        break;
        case (window.location.href.indexOf('/laporan/kebutuhan/staff') != -1): data_kebutuhan_staff_index();
        break;

        case (window.location.href.indexOf('/laporan/keluhan/mahasiswa') != -1): data_keluhan_mahasiswa_index();
        break;
        case (window.location.href.indexOf('/laporan/keluhan/dosen') != -1): data_keluhan_dosen_index();
        break;
        case (window.location.href.indexOf('/laporan/keluhan/staff') != -1): data_keluhan_staff_index();
        break;
        
    }
});