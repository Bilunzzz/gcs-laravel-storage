<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
<h2>Upload File ke Google Cloud Storage</h2>

@if (session('success'))
    <p style="color: green;">{{ session('success') }}</p>
    <p>File URL: <a href="{{ session('fileUrl') }}" target="_blank">{{ session('fileUrl') }}</a></p>
@endif

<form action="{{ route('upload.file') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file">
    <button type="submit">Upload</button>
</form>
</body>
</html>