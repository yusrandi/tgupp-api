<table class="table table-bordered mb-0 text-nowrap">
   
    <thead>
        <tr>
            <td colspan="8" style="text-align: center; border:none;"><b>DAFTAR HONORARIUM PEGAWAI KEGIATAN TENAGA AHLI TIM GUBERNUR (NON ASN) UNTUK PERCEPATAN PEMBANGUNAN</b></td>
        </tr>
        <tr>
            <td colspan="8" style="text-align: center; border:none;"><b>PROVINSI SULAWESI SELATAN TAHUN 2023</b></td>

        </tr>
        <tr>
            <td colspan="8" style="text-align: center; border:none;"></td>
        </tr>
        <tr>
            <th rowspan="2" class="text-center">#</th>
            <th rowspan="2" class="text-center">NAMA LENGKAP</th>
            <th rowspan="2" class="text-center">JABATAN</th>
            <th rowspan="2" class="text-center">PENDIDIKAN</th>
            <th colspan="3" class="text-center">JUMLAH YG DITERIMA</th>
            <th rowspan="2" class="text-center">TANDA TANGAN</th>
        </tr>
        <tr>

            <th class="text-center">NOMINAL</th>
            <th  class="text-center">JUM. KEG.</th>
            <th class="text-center">JUMLAH</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['fullname'] }}</td>
                <td class="text-center">{{ $item['jabatan'] }}</td>
                <td class="text-center">{{ $item['title'] }}</td>
                <td class="text-right">{{ number_format($item['nominal']) }}</td>
                <td class="text-center">X {{ $item['qty'] }}</td>
                <td class="text-right">{{ number_format($item['salary']) }}</td>
                <td></td>
            </tr>
        @endforeach
        @for ($i = 0; $i < 4; $i++)
            <tr>
                @for ($i = 0; $i < 8; $i++)
                    <td></td>
                @endfor
            </tr>
        @endfor
        <tr>
            @for ($i = 0; $i < 8; $i++)
                <td></td>
            @endfor
        </tr>
        <tr>
            @for ($i = 0; $i < 8; $i++)
                <td></td>
            @endfor
        </tr>
        <tr>
            <td colspan="2">Mengetahui/Menyetujui :</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Yang Menerima,</td>
        </tr>
        <tr>
            <td colspan="2">Kepala Bidang Perencanaan, Pengendalian </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">dan Evaluasi Pembangunan Daerah</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2">PPTK;</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            @for ($i = 0; $i < 8; $i++)
                <td></td>
            @endfor
        </tr>
        <tr>
            @for ($i = 0; $i < 8; $i++)
                <td></td>
            @endfor
        </tr>
        <tr>
            @for ($i = 0; $i < 8; $i++)
                <td></td>
            @endfor
        </tr>
        <tr>
            @for ($i = 0; $i < 8; $i++)
                <td></td>
            @endfor
        </tr>
        <tr>
            <td colspan="2" style="text-decoration: underline;"><b><u>Ir. A. M. Arifin Iskandar, M.Si</u></b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-decoration: underline;"><b><u>Moch. Anugrah, S.T</u></b></td>
        </tr>
        <tr>
            <td colspan="2" ><b>Pangkat: Pembina Tk.I/IV.b</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="2" ><b>NIP : 19660509 199503 1 002</b></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

    </tbody>
</table>
