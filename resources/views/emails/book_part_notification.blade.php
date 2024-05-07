<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Part Notification</title>
</head>
<body>
    <h1>New Book Part Created!</h1>
    <p>Hello,</p>
    <p>A new part of the {{ $bookPart->book->title }} book {{$bookPart->part_number }} - {{$bookPart->part_title}} has been created. Check it out!</p>
    <p>Thank you.</p>
</body>
</html>
