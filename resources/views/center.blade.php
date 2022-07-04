@extends('layouts.app')
@section('content')
<div class="d-flex" style="display: flex; justify-content: center; flex-direction: row;">
    <div class="card" id="card" style="align-items:center;">
        <div class="card-body">
            <a class="card-text" id="pwd" style="color:black; font-size:20px;text-decoration: none; border: 2px solid #000000; padding: 5px;">Click here to generate PASSWORD</a>
            <br>
            <button id="btn" style="margin-top:10px; ">Change to ***</button>
        </div>
    </div>
</div>

<script>
    $('#pwd').on('click', function() {
        var randomColor = '#' + Math.floor(Math.random() * 16777215).toString(16);
        $('#card').css('background-color', randomColor);

        var randomPwd = '';
        var characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        for (var i = 0; i < 20; i++) {
            randomPwd += characters.charAt(Math.floor(Math.random() * characters.length));
        }
        $('#pwd').text(randomPwd);
    })

    $('#btn').on('click', function() {
        var p = $('#pwd').text();
        var randomPwd = '';
        for (var i = 0; i < p.length; i++) {
            randomPwd += '*';
        }
        $('#pwd').text(randomPwd);
    })
</script>
@endsection