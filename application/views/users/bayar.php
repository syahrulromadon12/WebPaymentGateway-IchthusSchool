<div class="row justify-content-center mt-3">
    <?php foreach ((array)$biaya as $data) : ?>
        <div class="col-md-3 rounded shadow mb-5 mx-5" style="background: #E2D6E5;">
            <div class="card-body">
                <h5 class="text-center mt-3 fw-bold"><?= $data['nama_biaya']; ?></h5>
                <hr>
                <table>
                    <tr>
                        <td class="fw-bold">Pokok</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="fw-bold">Rp.<?= number_format($data['harga']); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Admin</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="fw-bold">Rp.<?= number_format($data['biaya_admin']); ?></td>
                    </tr>
                    <tr>
                        <td class="fw-bold">Total</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td class="fw-bold">Rp.<?= number_format((int)$data['harga'] + (int)$data['biaya_admin']) ?></td>
                    </tr>
                </table>
                <hr>
                <p class="fw-bold">Periode Pembayaran</p>
                <p><?= $data['awal_bayar']; ?> - <?= $data['akhir_bayar']; ?></p>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-end">
                <button class="btn btn-secondary mt-4 mb-4 pay-button" 
                        data-nama="<?= $user['nama'] ?>" 
                        data-nis="<?= $user['nis'] ?>" 
                        data-no_hp="<?= $user['no_hp'] ?>" 
                        data-email="<?= $user['email'] ?>" 
                        data-nama-biaya="<?= $data['nama_biaya'] ?>" 
                        data-kode-biaya="<?= $data['kode_biaya'] ?>" 
                        data-biaya="<?= $data['harga'] ?>" 
                        data-admin="<?= $data['biaya_admin'] ?>" 
                        data-jumlah="<?= (int)$data['harga'] + (int)$data['biaya_admin'] ?>">Bayar</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<form id="payment-form" method="post" action="<?= site_url() ?>/snap/finish">
    <input type="hidden" name="result_type" id="result-type" value="">
    <input type="hidden" name="result_data" id="result-data" value="">
    <input type="hidden" name="nama" id="nama" value="<?= $user['nama'] ?>">
    <input type="hidden" name="nis" id="nis" value="<?= $user['nis'] ?>">
    <input type="hidden" name="email" id="email" value="">
    <input type="hidden" name="nama_biaya" id="nama_biaya" value="">
    <input type="hidden" name="kode_biaya" id="kode_biaya" value="">
    <input type="hidden" name="biaya" id="biaya" value="">
    <input type="hidden" name="admin" id="admin" value="">
    <input type="hidden" name="jumlah" id="jumlah" value="">
</form>

<script type="text/javascript">
    $('.pay-button').click(function (event) {
        event.preventDefault();
        let button = $(this);

        // Set form values
        $('#nama').val(button.data('nama'));
        $('#nis').val(button.data('nis'));
        $('#email').val(button.data('email'));
        $('#nama_biaya').val(button.data('nama-biaya'));
        $('#kode_biaya').val(button.data('kode-biaya'));
        $('#biaya').val(button.data('biaya'));
        $('#admin').val(button.data('admin'));
        $('#jumlah').val(button.data('jumlah'));

        $.ajax({
            url: '<?= site_url() ?>/snap/token',
            method: 'POST',
            data: {
                nama: $('#nama').val(),
                nis: $('#nis').val(),
                email: $('#email').val(),
                nama_biaya: $('#nama_biaya').val(),
                kode_biaya: $('#kode_biaya').val(),
                biaya: $('#biaya').val(),
                admin: $('#admin').val(),
                jumlah: $('#jumlah').val()
            },
            cache: false,
            success: function (data) {
                snap.pay(data, {
                    onSuccess: function (result) {
                        changeResult('success', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onPending: function (result) {
                        changeResult('pending', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    },
                    onError: function (result) {
                        changeResult('error', result);
                        console.log(result.status_message);
                        $("#payment-form").submit();
                    }
                });
            }
        });

        function changeResult(type, data) {
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
        }
    });
</script>
