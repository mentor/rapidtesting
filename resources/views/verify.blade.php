<html>
<head>
    <title>{{ env('APP_NAME') }} - Certifikát</title>
</head>
<body>
<form method="post" action="{{ url()->current() }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if($isPinRC)
        <div class="form-group row">
            <label for="pinrc" class="col-sm-3 col-form-label">Rodné číslo</label>
            <div class="col-sm-9">
                <input name="Rodné číslo" type="text" class="form-control" id="pinrc" placeholder="123456/7890" required>
            </div>
            @error('pinrc')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    @else
        <div class="form-group row">
            <label for="pinid" class="col-sm-3 col-form-label">Číslo dokladu</label>
            <div class="col-sm-9">
                <input name="Rodné číslo" type="text" class="form-control" id="pinid" placeholder="123456/7890" required>
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
