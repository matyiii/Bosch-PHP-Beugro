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
    $('#productSelect').on("change",
        function() {
            var selectedProductId = $(this).find("option:selected").val();
            if (selectedProductId == '0') {
                $('#productionsTable tbody tr').each(
                    function() {
                        $(this).show();
                    }
                )
            } else {
                $('#productionsTable tbody tr').each(
                    function() {
                        var col_id = $(this).find('td')[1].innerText;
                        if (col_id !== selectedProductId) {
                            $(this).hide();
                        } else {
                            $(this).show();
                        }
                    }
                );
            }
        });
</script>
@endsection