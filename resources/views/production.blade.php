@extends('layouts.app')
@section('content')
<body>
    <container class="container-fluid">
        <div class="product">
            <label for="product">Choose a PCB:</label>
            <select name="product" id="productSelect">
                <option value="0">Select a PCB</option>
                @foreach($productRows as $row)
                <option value="{{ $row->id }}"> {{ $row->pcb}} - {{ $row->id }}</option>
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
                            <a href='delete/{{ $row->id }}'><button type="button">Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </container>
</body>
<script>
    $('#productSelect').change(function() {
        var selectedProductId = $('#productSelect option:selected');

        if (selectedProductId.text != 'Select a PCB') {
            var table = document.getElementById("productionsTable");
            var all_row = table.getElementsByTagName("tr");
            for (var i = 0; i < all_row.length; i++) {
                var name_column = all_row[i].getElementsByTagName("td")[1];
                if (name_column) {
                    var name_value = name_column.innerText;
                    if (name_value.match(selectedProductId.val())) {
                        all_row[i].style.display = "";
                    } else {
                        all_row[i].style.display = "none";
                    }
                }
            }
        }
    });
</script>
@endsection