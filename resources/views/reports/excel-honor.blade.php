<table class="table table-bordered mb-0 text-nowrap">
    <thead>
        <tr>
            <td colspan="4" style="text-align: center; border:none;"><b>DATA LAPORAN HONOR</b></td>
        </tr>
        <tr>
            <th>#</th>
            <th>Nama Lengkap</th>
            <th>Gelar</th>
            <th>Honor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item['fullname'] }}</td>
                <td>{{ $item['title'] }}</td>
                <td>Rp. {{ number_format($item['salary']) }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
