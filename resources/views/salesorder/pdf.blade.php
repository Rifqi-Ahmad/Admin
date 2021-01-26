<html>

<head>
    <title>Sales Order</title>
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 12pt;
            font-style: arial;
            text-align: left;
        }

        #tab {
            text-align: center;
        }

    </style>

    <center>
        <h1>Sales Order</h1>
        <h5>{{$data->code}}</h5>
    </center>

    <table class="table1">
        <tr>
            <th>Date</th>
            <td>:</td>
            <th>{{ date('l, d-m-Y', $data->date) }}</th>
        </tr>
        <tr>
            <th>Take Order</th>
            <td>:</td>
            <th>{{ date('l, d-m-Y', $data->take) }}</th>
        </tr>
        <tr>
            <th>Finished</th>
            <td>:</td>
            <th>{{ date('l, d-m-Y', $data->finished) }}</th>
        </tr>
        <tr>
            <th>Note</th>
            <td>:</td>
            <th>
                <textarea name="note" id="" cols="30" rows="3" readonly>{{$data->note}}</textarea>
            </th>
        </tr>
    </table>

    <table border="1" width="100%" cellspacing="0" cellpadding="10">
        <tr>
            <th>Id</th>
            <th>Desc</th>
            <th>Color</th>
            <th>Unit</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Sub Price</th>
        </tr>
        @foreach ($data1 as $item)

        <tr>
            <th>
                {{$item->id}}
            </th>
            <td>
                {{$item->desc}}
            </td>
            <td>
                {{$item->color}}
            </td>
            <td>
                {{$item->unit}}
            </td>
            <td>
                {{$item->qty}}
            </td>
            <td>
                {{$item->price}}
            </td>
            <td>
                {{$item->sub}}
            </td>
        </tr>
        @endforeach
        <tr>
            <th colspan="8">Grand Price : Rp {{$data->total}}</th>
        </tr>
    </table>




</body>

</html>
