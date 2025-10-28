<!doctype html>
<html>
<head><meta charset="utf-8"></head>
<body>
  <h2>Website Contact Message</h2>
  <p><strong>Name:</strong> {{ $data['name'] }}</p>
  <p><strong>Email:</strong> {{ $data['email'] }}</p>
  <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
  <p><strong>Subject:</strong> {{ $data['subject'] }}</p>
  <hr>
  <p style="white-space: pre-wrap;">{{ $data['message'] }}</p>
</body>
</html>
