<!DOCTYPE html>
<html>

<head>
    <title>PDF Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            min-height: 100%;
            position: relative;
            padding-bottom: [footer-height]
        }

        .eventTable {}

        .customeTable {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 50px;
        }

        .customeTable td,
        .customeTable th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        .customeTable tr:nth-child(even) {
            background-color: #dddddd;
        }

        .pegawaiTitle {
            text-align: center;
            margin: 20px 20px;
            font-weight: bold;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
        }

        .header h2 {
            font-size: 20px;
            margin: 0;
        }

        .content {
            margin: 10px 0;
        }

        .content h2 {
            text-align: center;
        }

        .content p {
            margin: 5px 0;
        }

        .section {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        .list {
            margin-left: 20px;
        }

        .footer {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            height: [footer-height];
            margin-top: 40px;
            text-align: center;
        }

        .footer p {
            margin: 2px;
        }

        .footer h2 {
            margin: 10px;
        }
    </style>

</head>

<body>

    <div class="header">
        <h1>[...Nama Instansi]</h1>
        <h2>[...Bagian Instansi]</h2>
        <p>JL. [....alamat] T. Telp. [....telpon] (Hunting) Fax. [...fax] [...kota] - [...kode pos]</p>
    </div>

    <hr>

    <div class="content">
        <h2>SURAT TUGAS</h2>

        <p>Keterangan Kegiatan:</p>
        <div class="section">
            <table style="eventTable">
                <thead>
                    <tr>
                        <td style="text-align: left; padding-right: 8px">
                            Nama
                        </td>
                        <td>
                            : {{ empty($eventForDetail) ? '' : $eventForDetail['namaEvent'] }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-right: 8px">
                            Jumlah
                        </td>
                        <td>
                            : {{ empty($eventForDetail) ? '' : $eventForDetail['jumlahOrang'] }} Orang
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-right: 8px">
                            Tanggal Mulai
                        </td>
                        <td>
                            :
                            {{ empty($eventForDetail) ? '' : date('d M Y', strtotime($eventForDetail['tanggalMulai'])) }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-right: 8px">
                            Tanggal Selesai
                        </td>
                        <td>
                            :
                            {{ empty($eventForDetail) ? '' : date('d M Y', strtotime($eventForDetail['tanggalSelesai'])) }}
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: left; padding-right: 8px">
                            Sertifikat
                        </td>
                        <td>
                            : {{ empty($eventForDetail) ? '' : $eventForDetail['namaSertifikat'] }}
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
        <p>Memberikan tugas kepada:</p>
        <table class="customeTable">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th scope="row">
                        NIP
                    </th>
                    <th>
                        Nama Pegawai
                    </th>
                    <th>
                        Status
                    </th>
                </tr>
            </thead>
            @if (!empty($penugasanForDetail))
                @php
                    $no = 1;
                @endphp
                @foreach ($penugasanForDetail as $item)
                    <tbody>
                        <tr>
                            <td>
                                {{ $no }}
                            </td>
                            <td>
                                {{ $item['nip'] }}
                            </td>
                            <td>
                                {{ $item['namaPegawai'] }}
                            </td>
                            <td>
                                Ready
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                @php
                    $no++;
                @endphp
            @endif
        </table>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam et mi at nisl tempor ultrices:</p>
        <div class="list">
            <p>1. In hac habitasse platea dictumst. Donec faucibus metus eget urna porta, rhoncus ullamcorper velit
                commodo.</p>
            <p>2. Pellentesque vel nulla id tortor venenatis rutrum. Donec bibendum tincidunt augue id lacinia
            </p>
            <p>3. Nullam ultrices arcu ac eros suscipit, sed lobortis mi aliquet. Mauris placerat diam porttitor ipsum
                vestibulum, id tempor diam fermentum. Maecenas euismod ipsum nibh, non venenatis lectus blandit vitae.
            </p>
        </div>

        <p>Demikian surat tugas ini dibuat dengan sebenarnya untuk dipergunakan sebagaimana mestinya.</p>
    </div>

    <div class="footer">
        <p>Dikeluarkan di: [...kota]</p>
        <p>Pada tanggal: [...tanggal]</p>
        <h2>[...orang yang mengeluarkan]</h2>
        <h2>[...bagian instansi]</h2>
    </div>
</body>

</html>
