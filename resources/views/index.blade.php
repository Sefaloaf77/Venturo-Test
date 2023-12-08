<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tes Venturo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="container-fluid">
        <div class="card" style="margin: 2rem 0rem;">
            <div class="card-header">
                Venturo - Laporan penjualan tahunan per menu
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf
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
                @isset($data)
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" style="margin: 0;">
                        <thead>
                            <tr class="table-dark">
                                <th rowspan="2" style="text-align:center;vertical-align: middle;width: 250px;">Menu</th>
                                <th colspan="12" style="text-align: center;">Periode Pada {{$data['tahun']}}
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
                            @foreach ($data['kategori'] as $kategori)
                            <tr>
                                <td class="table-secondary" colspan="14"><b>{{$kategori['kategori']}}</b></td>
                            </tr>
                            @foreach ($kategori['menu'] as $menu)
                            <tr>
                                <td>{{ $menu['nama'] }}</td>
                                @for ($i = 1; $i <= 12; $i++) @php $filled=false; @endphp @foreach ($menu['bulan'] as
                                    $key=> $bulan)
                                    @if ($key == $i)
                                    <td style="text-align: right;">
                                        {{ number_format($bulan['total']) }}
                                    </td>
                                    @php
                                    $filled = true;
                                    @endphp
                                    @break
                                    @endif
                                    @endforeach

                                    @if (!$filled)
                                    <td style="text-align: right;">
                                    </td>
                                    @endif
                                    @endfor
                                    <td style="text-align: right;"><b>{{ number_format($menu['total']) }}</b></td>
                            </tr>
                            @endforeach
                            @endforeach
                            <tr class="table-dark">
                                <td><b>Total</b></td>
                                @for ($i = 1; $i <= 12; $i++) @php $filled=false; @endphp @foreach
                                    ($data['trxBulan']['data'] as $k=> $valBulan)
                                    @if ($k == $i)
                                    <td style="text-align: right;">
                                        <b>{{ number_format($valBulan['total']) }}</b>
                                    </td>
                                    @php
                                    $filled = true;
                                    @endphp
                                    @break
                                    @endif
                                    @endforeach
                                    @if (!$filled)
                                    <td style="text-align: right;">
                                    </td>
                                    @endif
                                    @endfor
                                    <td style="text-align: right;"><b>{{ number_format($data['trxBulan']['total'])
                                            }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @endisset
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>