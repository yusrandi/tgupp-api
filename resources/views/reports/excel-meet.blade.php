<table class="table table-bordered mb-0 text-nowrap">
    <thead>
        <tr>
            <td colspan="8" style="text-align: center; border:none;"><b>DATA LAPORAN RAPAT</b></td>
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
                <td>{{ $item->meetResults->first()->leader }}</td>
                <td>{{ $item->meetResults->first()->notulen }}</td>
                <td>{{ $item->meetAttendances->count() . ' Orang' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
