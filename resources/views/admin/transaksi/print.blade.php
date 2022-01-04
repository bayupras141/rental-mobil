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
        td.bot
        {
            border-bottom: 1px solid #ddd;
        }
        td.no
        {
            border-bottom: 1px solid #ddd;
            padding-left: 180px;
        }
    </style>
</head>
<body>
    <div class="col-md-4">
        <h1>Nota Pembayaran</h1>
        <p>INV/{{$transaksi->invoice}}</p>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                
                <table>        
                    <tr>
                        <td><b>Penyewa</b></td>
                      </tr>
                    <tr>
                        <td class="no">Nama</td><td>:</td>
                        <td class="no">{{$transaksi->pelanggan->nama}}</td>
                      </tr>
                      <tr>
                        <td class="no">Alamat</td><td>:</td>  
                        <td class="no">{{$transaksi->pelanggan->alamat}}</td>      
                      </tr>  
                      <tr>
                        <td class="no">No Hp</td><td>:</td>
                        <td class="no">{{$transaksi->pelanggan->no_hp}}</td>
                      </tr>
                      <tr>
                        <td><b>Info Kendaraan</b></td>
                      </tr>
                      <tr>
                        <td class="no">Mobil</td><td>:</td>
                        <td class="no">{{$transaksi->mobil->nama}}</td>
                      </tr>
                      <tr>
                        <td class="no">Nomor Plat</td><td>:</td>
                        <td class="no">{{$transaksi->mobil->nopol}}</td>
                      </tr>
                      <tr>
                        <td><b>Transaksi</b></td>
                      </tr>
                      <tr>
                        <td class="no">Tanggal Sewa</td><td>:</td>
                        <td class="no">{{$transaksi->tgl_sewa}}</td>
                      </tr>
                      <tr>
                        <td class="no">Tanggal Kembali</td><td>:</td>
                        <td class="no">{{$transaksi->tgl_kembali}}</td>
                      </tr>
                    
                    <tr>
                    <td class="no">Jenis Paket</td><td> : </td>
                    <td class="no">{{$transaksi->paket->nama}}</td>
                    </tr>

                    <tr>
                    <td class="no">Harga</td><td> : </td>
                    <td class="no">Rp. {{number_format($transaksi->paket->harga,0,',','.')}}</td>
                    </tr>
                    
                    {{-- mencari jumlah_hari dari tgl_sewa + tgl_kembali --}}
                    <?php
                        $tgl_sewa = new DateTime($transaksi->tgl_sewa);
                        $tgl_kembali = new DateTime($transaksi->tgl_kembali);
                        $jumlah_hari = $tgl_sewa->diff($tgl_kembali)->days;
                    ?>
                    <tr>
                    <td class="no">Jumlah Hari</td><td> : </td>
                    <td class="no">{{$jumlah_hari}} Hari</td>
                    </tr>
                    
                    <tr>
                        <td><b>Sub Total</b></td>
                      </tr>
                    <tr>
                    <td class="no"></td><td class="bot"></td>
                    <td class="no">Rp. {{number_format($harga_asli,0,',','.')}}</td>
                    </tr>

                    <tr>
                      <td><b>Potongan Harga</b></td>
                    </tr>
                  <tr>
                  <td class="no"></td><td class="bot"></td>
                  <td class="no">Rp. {{number_format($transaksi->potongan_harga,0,',','.')}}</td>
                  </tr>
                    
                  <tr>
                    <td><b>Total Bayar</b></td>
                  </tr>
                <tr>
                <td class="no"></td><td class="bot"></td>
                <td class="no">Rp. {{number_format($transaksi->total_bayar,0,',','.')}}</td>
                </tr>
                    <tr>
                      <td ></td><td ></td>
                      <td style="padding-left: 180px;">{{$transaksi->status}}</td>
                    </tr>
                    
                </table>
            </div>
        </div>
    </div>
</body>
</html>
