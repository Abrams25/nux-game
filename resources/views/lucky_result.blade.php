<!DOCTYPE html>
<html>
<head><title>Lucky Result</title></head>
<body>
<h2>Lucky Draw</h2>
<p>Number: {{ $result->number }}</p>
<p>Result: {{ $result->result }}</p>
<p>Amount: ${{ $result->amount }}</p>

<a href="/link/{{ request()->route('uuid') }}">Back</a>
</body>
</html>
