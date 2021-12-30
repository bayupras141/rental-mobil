<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <style>
        /* css table styles detail Pembayaran*/
        .table-bordered {
            border: 1px solid #ddd;
        }
        /* create css h1 text align center */
        h1 {
            text-align: center;
        }
        p {
            text-align: center;
        }

        td, th {
            text-align: left;
            padding: 8px;
        }
        td
        {
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <div class="col-md-4">
        <h1>Data Transaksi</h1>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                
                <table class="data-table table table-sm table-bordered table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>Tanggal Sewa</th>
                            <th>Tanggal Kembali</th>
                            <th>Pelanggan</th>
                            <th>Mobil</th>
                            <th>Paket</th>
                            <th>Total Bayar</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($transaksi as $key => $data)
                        <tr>
                            <td>{{ $data->tgl_sewa }}</td>
                            <td>{{ $data->tgl_kembali }}</td>
                            <td>{{ $data->pelanggan->nama }}</td>
                            <td>{{ $data->mobil->nama }}</td>
                            <td>{{ $data->paket->nama }}</td>
                            <td>Rp. {{ number_format($data->total_bayar, 0, ',', '.') }}</td>

                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Pendapatan</td>
                            <td>Rp. {{ number_format($pendapatan, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>
</html>
