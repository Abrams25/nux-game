<!DOCTYPE html>
<html>
<head>
    <title>History</title>
</head>
<body>

@if (count($history) === 0)
    <p>There is no history.</p>
@else
    <table border="1" cellpadding="10">
        <thead>
        <tr>
            <th>#</th>
            <th>Number</th>
            <th>Result</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($history as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item['random_number'] }}</td>
                <td>{{ $item['result'] }}</td>
                <td>${{ $item['win_amount'] }}</td>
                <td>{{ \Carbon\Carbon::parse($item['created_at'])->format('Y-m-d H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

<br>
<a href="/link/{{ $userLink->uuid }}">Back</a>
</body>
</html>
