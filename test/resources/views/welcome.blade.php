<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-includes.includes-top />
    <title>Document</title>
</head>

<body>
    <div class="display-1">Tie</div>
    Ello there {{$user}}
    @if (TRUE)
    <br>WowZeros
    @endif
    <br>
    <x-alerts.alert_main :message="'This is bad!'" style="border: 9px solid black;">
        What de hell;
    </x-alerts.alert_main>

<x-includes.includes-bottom />
</body>
</html>