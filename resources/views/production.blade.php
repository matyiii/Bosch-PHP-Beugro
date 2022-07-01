<?php

use Illuminate\Support\Facades\DB;

$rows = DB::table('production')->orderBy('id')->get();
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Production Table</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>

<body>
    <div class="productions">
        <table class="table table-bordered">
            <thead>
                <th>Id</th>
                <th>Pcb_Id</th>
                <th>Quantity</th>
                <th>startDate</th>
                <th>endDate</th>
                <th>Functions</th>
            </thead>
            <tbody>
                @foreach($rows as $row)
                <tr>
                    <td>{{$row->id}}</td>
                    <td>{{$row->pcb_id}}</td>
                    <td>{{$row->quantity}}</td>
                    <td>{{$row->startDate}}</td>
                    <td>{{$row->endDate}}</td>
                    <td>
                        <button type="submit" title="delete">
                            <i class="fas fa-trash fa-lg text-danger">Delete</i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>