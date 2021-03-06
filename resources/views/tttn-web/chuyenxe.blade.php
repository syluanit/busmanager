@extends('tttn-web.main')
@section('title')
    Chuyến xe
@endsection
@section('content')
    <div class="buoc">
        <ul>
            <li>Tìm Chuyến</li>
            <li class="stay">Chọn Chuyến</li>
            <li>Chi Tiết Vé</li>
        </ul>
    </div>
    <div class="chuyenxemain">
        <table>
            <tr>
                <th>Mã chuyến</th>
                <th>Tuyến</th>
                <th>Giờ Xuất Bến</th>
                <th>Loại Xe</th>
                <th>Giá</th>
                <th>Đặt Mua</th>
            </tr>
            @foreach($Chuyenxe as $t)
                <tr>
                    <td>{{$t->Mã}}</td>
                    <td><span>{{$t->Nơi_đi}} -> {{$t->Nơi_đến}}</span></td>
                    <td><span>{{$t->Ngày_xuất_phát}} : {{$t->Giờ_xuất_phát}}</span></td>
                    <td><span>{{($t->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}}</span></td>
                    <td><span>{{($t->Tiền_vé)/1000}}.000 VNĐ</span></td>
                    <td><div class="chuyenxetim">
                            @if(Session::has('makh'))
                                <i class="fa fa-arrow-right icon-flat bg-btn-actived"></i>
                                <button type="button" class="btn"><a href="chonve/{{$id=$t->Mã}}">Đặt vé</a></button>
                            @else
                                <i class="fa fa-arrow-right icon-flat bg-btn-actived"></i>
                                <button type="button" class="btn"><a data-toggle="modal" data-target="#login" data-dismiss="modal" >Đặt vé</a></button>
                            @endif
                        </div></td>
                </tr>
                @endforeach
        </table>
    </div>
@endsection
