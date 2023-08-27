<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($partidac as $invoice)
        <tr>
            <td>{{ $invoice->id }}</td>
            <td>{{ $invoice->idcatalogo }}</td>
        </tr>
    @endforeach
    </tbody>
</table>