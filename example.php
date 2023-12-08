<?php
if (isset($_GET['tahun'])) {
    $menu = json_decode(file_get_contents("http://tes-web.landa.id/intermediate/menu"), true);
    $transaksi = json_decode(file_get_contents("http://tes-web.landa.id/intermediate/transaksi?tahun=" . $_GET['tahun']), true);

    $tmp = [];
    foreach ($menu as $i => $m) {
        $tmp[$m['kategori']][$m['menu']] = [];
        foreach ($transaksi as $j => $t) {
            // asort($t);
            if ($m['menu'] == $t['menu']) {
                $tmp[$m['kategori']][$m['menu']][] = [
                    'tanggal' => $t['tanggal'],
                    'menu' => $t['menu'],
                    'kategori' => $m['kategori'],
                    'total' => $t['total']
                ];
            }

        }
    }
    $jan = array();
    $feb = array();
    $mar = array();
    $apr = array();
    $mei = array();
    $jun = array();
    $jul = array();
    $ags = array();
    $sep = array();
    $okt = array();
    $nov = array();
    $des = array();
    $sum = 0;
    // $tmpPerBulan = [$jan, $feb, $mar, $apr, $mei, $jun, $jul, $ags, $sep, $okt, $nov, $des, $sum];
    $tmpPerBulan = [];
    // echo '<pre>';
    // print_r($tmp);
    // die();
    foreach ($tmp['makanan'] as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            // asort($value2);

            // $getTahun = date('Y', strtotime($value['tanggal']));
            $getBulan = date('m', strtotime($value2['tanggal']));
            // echo '<pre>';
            // print_r($value2['total']);
            // die();
            if ($value2['total'] && $getBulan == '01') {
                $jan[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '02') {
                $feb[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '03') {
                $mar[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '04') {
                $apr[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '05') {
                $mei[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '06') {
                $jun[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '07') {
                $jul[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '08') {
                $ags[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '09') {
                $sep[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '10') {
                $okt[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '11') {
                $nov[$key1] += $value2['total'];
            } else if ($value2['total'] && $getBulan == '12') {
                $des[$key1] += $value2['total'];
            }
            $sum = array_sum($jan) + array_sum($feb) + array_sum($mar) + array_sum($apr) + array_sum($mei) + array_sum($jun) + array_sum($jul) + array_sum($ags) + array_sum($sep) + array_sum($okt) + array_sum($nov) + array_sum($des);
            $tmpPerBulan[$key1] = [$jan, $feb, $mar, $apr, $mei, $jun, $jul, $ags, $sep, $okt, $nov, $des, $sum];
            ;
        }

    }
    echo '<pre>';
    print_r($tmpPerBulan);
    die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        td,
        th {
            font-size: 11px;
        }
    </style>
    <title>TES - Venturo Camp Tahap 2</title>
</head>

<body>
    <div class="container-fluid">
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-header">
                Venturo - Laporan penjualan tahunan per menu
            </div>
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-2">
                            <div class="form-group">
                                <select id="my-select" class="form-control" name="tahun">
                                    <option value="">Pilih Tahun</option>
                                    <option value="2021" selected="">2021</option>
                                    <option value="2022">2022</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">
                                Tampilkan
                            </button>
                            <a href="http://tes-web.landa.id/intermediate/menu" target="_blank" rel="Array Menu"
                                class="btn btn-secondary">
                                Json Menu
                            </a>
                            <a href="http://tes-web.landa.id/intermediate/transaksi?tahun=2021" target="_blank"
                                rel="Array Transaksi" class="btn btn-secondary">
                                Json Transaksi
                            </a>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="margin: 0;">
                        <thead>
                            <tr class="table-dark">
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu</th>
                                <th colspan="12" style="text-align: center;">Periode Pada
                                    <? $_GET['tahun'] ?>
                                </th>
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width:75px">Total</th>
                            </tr>
                            <tr class="table-dark">
                                <th style="text-align: center;width: 75px;">Jan</th>
                                <th style="text-align: center;width: 75px;">Feb</th>
                                <th style="text-align: center;width: 75px;">Mar</th>
                                <th style="text-align: center;width: 75px;">Apr</th>
                                <th style="text-align: center;width: 75px;">Mei</th>
                                <th style="text-align: center;width: 75px;">Jun</th>
                                <th style="text-align: center;width: 75px;">Jul</th>
                                <th style="text-align: center;width: 75px;">Ags</th>
                                <th style="text-align: center;width: 75px;">Sep</th>
                                <th style="text-align: center;width: 75px;">Okt</th>
                                <th style="text-align: center;width: 75px;">Nov</th>
                                <th style="text-align: center;width: 75px;">Des</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-secondary" colspan="14"><b>Makanan</b></td>
                            </tr>
                            <tr>
                                <? foreach ($tmp['makanan'] as $menu => $value) { ?>

                                    <td>
                                        <? $menu ?>
                                    </td>
                                <? } ?>
                                <td style="text-align: right;">
                                    130,000
                                </td>

                                <td style="text-align: right;"><b>665,000</b></td>
                            </tr>
                            <tr>
                                <td class="table-secondary" colspan="14"><b>Minuman</b></td>
                            </tr>
                            <tr>
                                <td>Teh Hijau</td>
                                <td style="text-align: right;">
                                    60,000
                                </td>
                                <td style="text-align: right;">
                                    70,000
                                </td>
                                <td style="text-align: right;">
                                    90,000
                                </td>
                                <td style="text-align: right;">
                                    190,000
                                </td>
                                <td style="text-align: right;">
                                    10,000
                                </td>
                                <td style="text-align: right;">
                                    150,000
                                </td>
                                <td style="text-align: right;">
                                    40,000
                                </td>
                                <td style="text-align: right;">
                                    10,000
                                </td>
                                <td style="text-align: right;">
                                    40,000
                                </td>
                                <td style="text-align: right;">
                                </td>
                                <td style="text-align: right;">
                                    20,000
                                </td>
                                <td style="text-align: right;">
                                    30,000
                                </td>
                                <td style="text-align: right;"><b>710,000</b></td>
                            </tr>
                            <tr class="table-dark">
                                <td><b>Total</b></td>
                                <td style="text-align: right;">
                                    <b>469,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>605,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>350,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>604,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>257,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>464,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>228,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>303,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>229,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>169,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>157,000</b>
                                </td>
                                <td style="text-align: right;">
                                    <b>130,000</b>
                                </td>
                                <td style="text-align: right;"><b>3,965,000</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php if (isset($menu)) { ?>

                <div class="row m-3">
                    <div class="col-6">
                        <h4>Isi Json Menu</h4>
                        <pre style="height: 400px; background:#eaeaea;"><?php var_dump($menu) ?></pre>
                    </div>
                    <div class="col-6">
                        <h4>Isi Json Transaksi</h4>
                        <pre style="height: 400px; background:#eaeaea;"><?php var_dump($transaksi) ?></pre>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>

</html>