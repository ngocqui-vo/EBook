@extends('layouts.admin')

@section('content')
    <h1>Thống kê</h1>

    <form action="{{ route('admin.statistic') }}" method="GET">
        <label for="date">Chọn ngày để thống kê</label>
        <input type="month" id="date" name="date" value="{{$year}}-{{$month}}">
        
        <button type="submit" class="btn btn-primary">Thống kê</button>
        @if ($errors->any())
            <h4 class="text-danger">{{ $errors->first()}}</h4>
        @endif
    </form>

    <table class="table">
        <thead>
            <tr>
                {{-- <th scope="col">ID</th> --}}
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Số lượng</th>
                <th class="col">Tổng tiền</th>
            </tr>
        </thead>
        <tbody>

            @php
                $total_quantity = 0;
                $total_price = 0;
            @endphp
            @foreach ($arr as $item)
                @php
                    $total_quantity += $item->quantity;
                    $total_price += $item->totalPrice();
                @endphp
                <tr>
                    <td class="col">
                        <div>{{ $item->bookPart->book->title }}</div>
                        <div><small>{{ $item->bookPart->part_number }} - {{ $item->bookPart->part_title }}</small></div>
                    </td>
                    <td class="col">{{ $item->quantity }}</td>
                    <td class="col">{{ $item->totalPrice() }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <tfoot>
        <h5>Tổng số lượng: {{ $total_quantity }}</h5>
        <h5>Tổng giá: {{ $total_price }}</h5>
    </tfoot>
@endsection
