<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Events</title>
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            background-color: #FAFAFA;
            font: 12pt "Tahoma";
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
        }

        * {
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        .subpage {
            padding: 1cm;
            border: 5px red solid;
            height: 257mm;
            outline: 2cm #FFEAEA solid;
        }

        td {
            padding-top: 5px;
        }

        .kp {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .logo {
            text-align: center;
            font-size: small;
        }

        .text {
            text-align: center;
            margin-top: 15px;
        }

        .cntr {
            font-size: small;
            text-align: left;
            margin-left: 40px;
            margin-right: 40px;
        }

        .translation {
            display: block;
            font-size: small;
            margin-top: -9px;
            font-style: italic;
        }

        table {
            border-collapse: collapse;
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 40px;
            width: 100%; /* Ensure table takes full width */
        }

        .ini {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            font-size: small;
            padding: 0;
        }

        .ttd {
            text-align: left;
            font-size: small;
            padding: 0px;
            margin-top: -10px;
            font-style: italic;
        }

        .ttd1 {
            text-align: left;
            font-size: small;
            padding: 0px;
        }

        .left {
            padding-left: 10px;
        }

        .footer {
            background: #204b8c;
            color: #fff;
            text-align: center;
            font-size: small;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .ket {
            margin-left: 290px;
        }

        body {
            font-family: 'Tahoma';
        }

        .tengah {
            text-align: center;
        }

        .page {
            width: 297mm; /* Adjusted for A4 landscape width */
            min-height: 210mm; /* Adjusted for A4 landscape height */
            padding: 0mm;
            margin: 0mm auto;
            border: 1px #D3D3D3 solid;
            border-radius: 5px;
            background: white;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .page::before {
            content: "";
            top: 0;
            left: 0;
            width: 189px;
            height: 189px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .page::after {
            content: "";
            bottom: 0;
            right: 0;
            width: 794px;
            height: 49px;
            background-size: cover;
            background-repeat: no-repeat;
        }

        @page {
            size: A4 landscape; /* Change to landscape */
            margin: 0;
        }

        @media print {
            html,
            body {
                width: 297mm; /* Adjusted for A4 landscape width */
                height: 210mm; /* Adjusted for A4 landscape height */
            }

            .page {
                padding: 0mm;
                margin: 0mm auto;
                border: 1 px #D3D3D3 solid;
                border-radius: 5px;
                background: white;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .page::before {
                content: "";
                top: 0;
                left: 0;
                width: 189px;
                height: 189px;
                background-size: cover;
                background-repeat: no-repeat;
            }

            .page::after {
                content: "";
                bottom: 0;
                right: 0;
                width: 794px;
                height: 49px;
                background-size: cover;
                background-repeat: no-repeat;
            }
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="book">
        <div class="page" id="result">
            <div class="ml-[6px] mr-[90px]">
                <table class="border border-1 border-black w-full">
                    <thead>
                        <tr>
                            <th class="border border-1 border-black">NO</th>
                            <th class="border border-1 border-black">TANGGAL BOOKING</th>
                            <th class="border border-1 border-black">KODE INVOICE</th>
                            <th class="border border-1 border-black">CLIENT</th>
                            <th class="border border-1 border-black">KODE PAKET</th>
                            <th class="border border-1 border-black">DETAIL PAKET</th>
                            <th class="border border-1 border-black">LOKASI</th>
                            <th class="border border-1 border-black">TANGGAL ACARA</th>
                            <th class="border border-1 border-black">STATUS</th>
                            <th class="border border-1 border-black">TOTAL HARGA</th>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $d)
                            <tr>
                                <td class="border border-1 border-black tengah">{{ $no++ }}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->tanggal }}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->kode_invoice }}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->client->namapl }}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->paket->kode_paket }}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->paket->jenis_paket }}, {{ $d->paket->makeup->type_makeup}}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->client->alamat }}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->tanggal_acara }}</td>
                                <td class="border border-1 border-black pl-2 tengah">{{ $d->status }}</td>
                                <td class="border border-1 border-black pl-2 tengah">Rp {{ number_format($d->total_bayar,2)}}</td>
                                
                                {{-- <td class="border border-1 border-black pl-2">{{ $d->user->name }}</td> --}}
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<script>
    // window.print();
</script>
