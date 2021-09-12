<html>
<head>
    <title>{{ env('APP_NAME') }} - Certifikát</title>
    <style>
        body {
            font-family: DejaVu Sans;
            color: #555555;
            font-size:14px;
        }
        .corona {
            background-attachment: fixed;
            background-image: url('{{ asset('images/virus.svg') }}');
            background-repeat: no-repeat;
            background-position: 115% 210%;
            background-size: 40%;
        }
    </style>
</head>
<body class="corona">
<form method="post" enctype="multipart/form-data">
    @csrf
    @if($isPinRC)
        <div class="form-group row">
            <label for="pinrc" class="col-sm-3 col-form-label">Rodné číslo</label>
            <div class="col-sm-9">
                <input name="pinrc" type="text" class="form-control" id="pinrc" placeholder="123456/7890" required>
            </div>
            @error('pinrc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    @else
        <div class="form-group row">
            <label for="pinid" class="col-sm-3 col-form-label">Číslo dokladu (občiansky preukaz alebo pas)</label>
            <div class="col-sm-9">
                <input name="pinid" type="text" class="form-control" id="pinid" placeholder="(občiansky preukaz alebo pas)" required>
            </div>
            @error('pinid')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    @endif
    <div class="form-group row">
        <button type="submit">Odoslať</button>
    </div>
</form>
</body>
</html>
