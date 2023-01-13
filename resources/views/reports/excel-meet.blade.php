<table class="table table-bordered mb-0 text-nowrap">
    <thead>
        <tr>
            <td colspan="8" style="text-align: center; border:none;"><b>DAFTAR RAPAT PEGAWAI KEGIATAN TENAGA AHLI TIM GUBERNUR (NON ASN) UNTUK PERCEPATAN PEMBANGUNAN</b></td>
        </tr>
        <tr>
            <td colspan="8" style="text-align: center; border:none;"><b>PROVINSI SULAWESI SELATAN TAHUN 2023</b></td>

        </tr>
        <tr>
            <td colspan="8" style="text-align: center; border:none;"></td>
        </tr>
        
        <tr>
            <th>#</th>
            <th>Nama Rapat</th>
            <th>Mulai Rapat</th>
            <th>Akhir Rapat</th>
            <th>Tempat</th>
            <th>Pimpinan</th>
            <th>Notulen</th>
            <th>Peserta</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->begin }}</td>
                <td>{{ $item->end }}</td>
                <td>{{ $item->place }}</td>
                <td>{{ $item->meetResults->isEmpty() ? '-' : $item->meetResults->first()->leader }}</td>
                <td>{{ $item->meetResults->isEmpty() ? '-' : $item->meetResults->first()->notulen }}</td>
                <td>{{ $item->meetAttendances->isEmpty() ? '-' : $item->meetAttendances->count() . ' Orang' }}</td>

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
