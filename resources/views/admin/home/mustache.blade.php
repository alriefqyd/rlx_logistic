<script id="js-cek-harga-template" type="x-tmpl-mustache">
    <div class="x_content js-cek-harga">
        <div class="row">
            <div class="col-xs-12 table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Lokasi Pengiriman</th>
                        <th>Lokasi Tujuan</th>
                        <th>Harga Regular</th>
                        @can('harga-regular')
                            <th>Aksi</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>@{{origin}}</td>
                        <td>@{{destination}}</td>
                        <td>Rp @{{ regular_price }}</td>
                        @can('harga-regular')
                            <td><a href="/prices/regular/@{{ id }}">Detail</a></td>
                        @endcan
                    </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
    </div>
</script>

<script id="js-cek-harga-template-error" type="x-tmpl-mustache">
    <div class="x_content js-cek-harga">
        <div class="row">
            <div class="col-xs-12 table">
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                    </button>
                    <strong>Data harga tidak ditemukan, Data belum dibuat</strong>
                  </div>
            </div>
            <!-- /.col -->
        </div>
    </div>
</script>
