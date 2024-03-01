<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Book Lending</title>
</head>
<body>
<h1>View Book Lending</h1>
<p><strong>Lending ID:</strong> {{ $bookLending->lending_id }}</p>
<p><strong>Lending Date:</strong> {{ $bookLending->lending_date }}</p>
<p><strong>Member ID:</strong> {{ $bookLending->member_id }}</p>
</body>
</html>
