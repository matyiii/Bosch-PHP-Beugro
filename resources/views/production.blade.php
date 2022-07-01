<?php

use Illuminate\Support\Facades\DB;

$productionRows = DB::table('production')->orderBy('id')->get();
$productRows = DB::table('products')->orderBy('id')->get();
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Production Table</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <container class="container-fluid">
        <div class="product">
            <label for="product">Choose a PCB:</label>
            <select name="product" id="productSelect">
                <option value="0">Select a PCB</option>
                @foreach($productRows as $row)
                <option value="{{ $row->id}}"> {{ $row->pcb}} - {{ $row->id }}</option>
                @endforeach
            </select>
        </div>
        <div class="productions" id="productionsTable">
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
                    @foreach($productionRows as $row)
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
    </container>
</body>
<script>
    $('#productSelect').change(function(){
        var selectedProductId = $('#productSelect option:selected');

        if(selectedProductId.text !='Select a PCB'){
            var table = document.getElementById("productionsTable");
            var all_row = table.getElementsByTagName("tr");
            for (var i=0; i<all_row.length;i++){
                var name_column = all_row[i].getElementsByTagName("td")[1];
                if(name_column){
                    var name_value = name_column.textContent || name_column.innerText;
                    if(name_value.match(selectedProductId.val())){
                        all_row[i].style.display="";
                    }
                    else{
                        all_row[i].style.display="none";
                    }
                }
            }
        }
    });
</script>