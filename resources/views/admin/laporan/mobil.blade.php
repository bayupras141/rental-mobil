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
        <h1>Data Mobil</h1>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nopol</th>
                            <th>Warnra</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mobil as $m)
                        <tr>
                            <td>{{$m->nama}}</td>
                            <td>{{$m->nopol}}</td>
                            <td>{{$m->warna}}</td>
                            <td>{{$m->status}}</td>
                        </tr>
                        @endforeach
                    </tbody>        
       
                </table>
            </div>
        </div>
    </div>
</body>
</html>
