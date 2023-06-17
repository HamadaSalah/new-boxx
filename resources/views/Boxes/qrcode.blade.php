<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
 {{-- \QrCode::format('png')->merge(public_path('logo.png'), 0.4, true)
            ->size(500)->errorCorrection('H')->color(5, 179, 227)
            ->gradient(100, 100, 201, 48, 48, 51, 'vertical')
            ->generate('http://mystery.test/boxshowing/' . $boxID); --}}
            {{-- <div class="visible-print text-center">
                {!!  \QrCode::format('png')->merge(public_path('logo.png'), 0.4, true)
                        ->size(500)->errorCorrection('H')->color(5, 179, 227)
                        ->gradient(100, 100, 201, 48, 48, 51, 'vertical')
                        ->generate('http://mystery.test/boxshowing/' . $boxID); !!}
</div> --}}
{!! QrCode::format('svg')->merge('logo.png', 0.4, true)->errorCorrection('H')
                        ->size(500)->errorCorrection('H')->color(5, 179, 227)
                        ->gradient(100, 100, 201, 48, 48, 51, 'vertical')
                        ->generate('http://mystery.test/boxshowing/' . $boxID) !!}
{{-- <img src="{!!$message->embedData(QrCode::format('png')->merge(public_path('logo.png'), 0.4, true)
                        ->size(500)->errorCorrection('H')->color(5, 179, 227)
                        ->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png')!!}"> --}}
</body>
</html>
