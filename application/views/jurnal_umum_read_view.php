<?= $head ?>

<!-- Start Page Loading -->
<div id="loader-wrapper">
    <div id="loader"></div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End Page Loading -->

<?= $header ?>

<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

        <?= $sidebar_left ?>

        <!-- START CONTENT -->
        <section id="content">

            <?= $breadcrumbs ?>

            <!--start container-->
            <div class="container">

                <!--Tambah Button-->
                <div class="divider"></div>

                <h4 style="text-align: center"><?php echo isset($_GET['bulan']) ? 'Bulan ke-' . $_GET['bulan'] . ' Tahun ' . $_GET['tahun'] : "Jurnal Umum" ?></h4>

                <div class="divider"></div>
                <!--End Tambah Button-->

                <?php

                if (!isset($_GET['bulan']))
                    $_GET['bulan'] = '-1';

                ?>

                <form action='' method='GET'>
                    <div class="row" style="">
                        <select class="col s6" name="bulan">
                            <option value="1" <?php echo $_GET['bulan'] == 1 ? "selected" : "" ?>>Januari</option>
                            <option value="2" <?php echo $_GET['bulan'] == 2 ? "selected" : "" ?>>Februari</option>
                            <option value="3" <?php echo $_GET['bulan'] == 3 ? "selected" : "" ?>>Maret</option>
                            <option value="4" <?php echo $_GET['bulan'] == 4 ? "selected" : "" ?>>April</option>
                            <option value="5" <?php echo $_GET['bulan'] == 5 ? "selected" : "" ?>>Mei</option>
                            <option value="6" <?php echo $_GET['bulan'] == 6 ? "selected" : "" ?>>Juni</option>
                            <option value="7" <?php echo $_GET['bulan'] == 7 ? "selected" : "" ?>>Juli</option>
                            <option value="8" <?php echo $_GET['bulan'] == 8 ? "selected" : "" ?>>Agustus</option>
                            <option value="9" <?php echo $_GET['bulan'] == 9 ? "selected" : "" ?>>September</option>
                            <option value="10" <?php echo $_GET['bulan'] == 10 ? "selected" : "" ?>>Oktober</option>
                            <option value="11" <?php echo $_GET['bulan'] == 11 ? "selected" : "" ?>>November</option>
                            <option value="12" <?php echo $_GET['bulan'] == 12 ? "selected" : "" ?>>Desember</option>
                        </select>
                        <input class="col s6" value="<?php echo isset($_GET['tahun']) ? $_GET['tahun'] : '' ?>" type="number" name="tahun" placeholder="Tahun" />
                    </div>
                    <button class="cyan waves-effect waves-light btn left" style="width: 100%; height:3rem; margin: 1rem auto">
                        <i class="mdi-content-add left"></i>TAMPILKAN
                    </button>
                </form>

                <!--DataTables-->
                <div id="table-datatables">
                    <div class="row">
                        <div class="col s4 m8 l12">

                            <table id="data-table-simple" class="responsive-table display excel-table" cellspacing="0" style="text-align: center">
                                <thead>
                                    <tr>
                                        <th colspan=6>Kini Cheese Tea</th>
                                    </tr>
                                    <tr>
                                        <th colspan=6>Jurnal Umum</th>
                                    </tr>
                                    <tr>
                                        <?php
                                        
                                        if (isset($_GET['tahun'])) {
                                            $date = new DateTime($_GET['tahun'] . '-' . $_GET['bulan'] . '-01');
                                            $last_date = $date->format('t-m-Y')
                                        }
                                        ?>
                                        <th colspan=6>Per <?php if (isset($_GET['tahun'])) echo $last_date ?></th>
                                    </tr>
                                    <tr>
                                        <th width="10%">ID Transaksi</th>
                                        <th width="">Tanggal</th>
                                        <th width="">Keterangan</th>
                                        <th width="">Ref</th>
                                        <th width="">Debit</th>
                                        <th width="">Kredit</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($data as $k => $v) {

                                        $debit = '';
                                        $credit = '';

                                        if ($v->posisi_d_c == 'd')
                                            $debit = $v->nominal;
                                        else
                                            $credit = $v->nominal;
                                    ?>
                                        <tr>
                                            <td><?php echo $v->id_transaksi; ?></td>
                                            <td><?php echo $v->tgl_jurnal; ?></td>
                                            <td style="text-align:left!important;">
                                                <?php
                                                echo $v->posisi_d_c == "c" ? "&nbsp&nbsp&nbsp&nbsp&nbsp" : "";
                                                echo $v->nama_akun;
                                                ?>
                                            </td>
                                            <td><?php echo $v->kode_akun; ?></td>
                                            <td><?php echo $debit; ?></td>
                                            <td><?php echo $credit; ?></td>
                                        </tr>

                                    <?php

                                    }

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End DataTables -->

                <!-- Table for PDF -->
                <div id="table-pdf" style="display:none">
                    <center>Kini Cheese Tea</center>
                    <center>Jurnal Umum</center>
                    <?php
                    if (isset($_GET['tahun'])) {
                        $date = new DateTime($_GET['tahun'] . '-' . $_GET['bulan'] . '-01');
                        $last_date = $date->format('t-m-Y');
                    }
                    ?>
                    <center>Per <?php if (isset($_GET['tahun'])) echo $last_date ?></center>
                    <table id="data-table-simple" class="responsive-table display excel-table" cellspacing="0" style="text-align: center;">
                        <thead>
                            <tr>
                                <th width="10%">ID Transaksi</th>
                                <th width="">Tanggal</th>
                                <th width="">Keterangan</th>
                                <th width="">Ref</th>
                                <th width="">Debit</th>
                                <th width="">Kredit</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($data as $k => $v) {

                                $debit = '';
                                $credit = '';

                                if ($v->posisi_d_c == 'd')
                                    $debit = $v->nominal;
                                else
                                    $credit = $v->nominal;
                            ?>
                                <tr>
                                    <td><?php echo $v->id_transaksi; ?></td>
                                    <td><?php echo $v->tgl_jurnal; ?></td>
                                    <td style="text-align:left!important;">
                                        <?php
                                        echo $v->posisi_d_c == "c" ? "&nbsp&nbsp&nbsp&nbsp&nbsp" : "";
                                        echo $v->nama_akun;
                                        ?>
                                    </td>
                                    <td><?php echo $v->kode_akun; ?></td>
                                    <td><?php echo $debit; ?></td>
                                    <td><?php echo $credit; ?></td>
                                </tr>

                            <?php

                            }

                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- Downloads -->
                <div class="row">
                    <div class="col s6">
                        <button id="download-excel" class="green waves-effect waves-light btn left" style="width: 100%; height:3rem; margin: 1rem auto">
                            <i class="mdi-content-add left"></i>DOWNLOAD EXCEL
                        </button>
                    </div>
                    <div class="col s6">
                        <button id="download-pdf" class="red waves-effect waves-light btn left" style="width: 100%; height:3rem; margin: 1rem auto">
                            <i class="mdi-content-add left"></i>DOWNLOAD PDF
                        </button>
                    </div>
                </div>

                <!--end container-->
        </section>
        <!-- END CONTENT -->

        <?= $sidebar_right ?>

    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->

<?= $footer ?>
<?= $scripts ?>