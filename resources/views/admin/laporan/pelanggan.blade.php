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
        <h1>Data Pelanggan</h1>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Nik</th>
                            <th>No HP</th>
                            <th>Jenis Kelamin</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pelanggan as $data)
                        <tr>
                            <td>{{$data->nama}}</td>
                            <td>{{$data->alamat}}</td>
                            <td>{{$data->nik}}</td>
                            <td>{{$data->no_hp}}</td>
                            <td>{{$data->jenis_kelamin}}</td>
                        </tr>
                        @endforeach
                    </tbody>        
                </table>
            </div>
        </div>
    </div>
</body>
</html>
