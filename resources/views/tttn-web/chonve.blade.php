@extends('tttn-web.main')
@section('title')
    Chọn vé
@endsection
@section('content')
    <div class="buoc">
        <ul>
            <li>Tìm Chuyến</li>
            <li>Chọn Vé</li>
            <li style="background: #f57812; color: #FFF;" class="stay">Chi Tiết Vé</li>
        </ul>
    </div>
    <div class="chonvemain">
        <div class="chonveleft">
            @foreach($chonve as $t)
            <h3>Thông tin vé</h3>
            <p><i class="fa fa-bus"></i> Nơi Khởi Hành: <a>{{$t->Nơi_đi}}</a></p><br>
            <p><i class="fa fa-bus"></i> Nơi đến: <a>{{$t->Nơi_đến}}</a></p> <br>
            <p><span class="glyphicon glyphicon-time"></span> Thời gian khởi hành: {{$t->Ngày_xuất_phát}} : {{$t->Giờ_xuất_phát}}</p><br>
            <p><span class="glyphicon glyphicon-bed"></span> {{($t->Loại_ghế==1)? 'Giường Nằm':'Ghế Ngồi'}} </p><br>
            <p><i class="fa fa-balance-scale"></i> Giá vé : {{$t->Tiền_vé/1000}}.000 vnđ</p><br>
            <p><i class="fa fa-address-card-o"></i> Vé đang chọn: </p><br>
            <button type="button" class="btn btn-success chondatve"  data-id={{$id}}>Đặt vé</button>
        </div>
         @endforeach
        <div class="chonveright">
            <h3>Sơ đồ xe</h3>
            <ul>
                <li><i class="loaighetrong"></i> &nbsp;Ghế còn trống</li>
                <li><i class="loaighechon"></i> &nbsp;Ghế đang chọn</li>
                <li><i class="loaigheban"></i> &nbsp;Ghế đã bán</li>
            </ul>
            <br>
            <table style="margin-top: 2em;" class="bangve">
                @if($sodo[0]->Loại_ghế == 1)
                <?php  $sd = $sodo[0]->Sơ_đồ; $dem=0; ?>
                    @for($i=0;$i<10;$i++)
                    <tr>
                       @for($j=0;$j<5;$j++)
                           @if($sd[$i * 5 + $j]==1 && ($i * 5 + $j)==0)
                                <td class="ghetaixe" title="Ghế tài xế"></td>
                            @elseif($sd[$i * 5 + $j]==1)
                                @if($ve[$dem]->Trạng_thái == 1)
                                <td class="ghe" title="Ghế đã bán cho khách"><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái ==0)
                                <td class="ghecontrong" title="Ghế trống" data-ma={{$ve[$dem]->Mã}}><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái == 2)
                                    @if($ve[$dem]->Mã_khách_hàng == Session::get('makh'))
                                        <td class="ghedangchon" title="Ghế Đang Chọn" data-ma={{$ve[$dem]->Mã}}><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                    
                                    @else
                                         <td class="ghecochon" title="Đã Có Người Chọn" data-ma={{$ve[$dem]->Mã}}><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                    
                                    @endif
                                @endif
                                  <?php  $dem++; ?>
                            @else
                                <td class="ghetrong"></td>
                            @endif
                       @endfor 
                    </tr>
                    @endfor
               @else
                    <?php  $sd = $sodo[0]->Sơ_đồ; $dem=0; ?>
                    @for($i=0;$i<12;$i++)
                    <tr>
                        @for($j=0;$j<6;$j++)
                            @if($sd[$i * 6 + $j]==1 && ($i * 6 + $j)==0)
                                <td class="ghetaixe" title="Ghế tài xế"></td>
                            @elseif($sd[$i * 6 + $j] == 1)
                                @if($ve[$dem]->Trạng_thái == 1)
                                <td class="ghe" title="Ghế đã bán cho khách"><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái ==0)
                                    <td class="ghecontrong" title="Ghế trống" data-ma={{$ve[$dem]->Mã}}><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                @elseif($ve[$dem]->Trạng_thái == 2)
                                    @if($ve[$dem]->Mã_khách_hàng == Session::get('makh'))
                                        <td class="ghedangchon" title="Ghế Đang Chọn" data-ma={{$ve[$dem]->Mã}}><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                    
                                    @else
                                         <td class="ghecochon" title="Đã Có Người Chọn" data-ma={{$ve[$dem]->Mã}}><div class="content">{{$ve[$dem]->Vị_trí_ghế}}</div></td>
                                    
                                    @endif
                                @endif
                                <?php $dem++; ?>
                            @else
                                <td class="ghetrong"></td>
                            @endif
                        @endfor
                    </tr>
                    @endfor
               @endif
            </table>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript">
        mang=[];
        $(document).ready(function(){
         $(".bangve").delegate(".ghecontrong","click",function(){
                ma = $(this).attr("data-ma");
                bien = $(this);
                makh = {{Session::get('makh')}};
                $.ajax({
                    url: '{{route("xulydatve")}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        MA: ma,
                        MAKH: makh
                    },
                    success: function (data) {
                       if(data.kq == 1){
                        bien.addClass("ghedangchon");
                        bien.removeClass("ghecontrong");
                        mang.push(ma);
                       }
                    }
             });
            });
               $(".bangve").delegate(".ghedangchon","click",function(){
                ma = $(this).attr("data-ma");
                bien = $(this);
                $.ajax({
                    url: '{{route("xulydatve2")}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        MA: ma,
                    },
                    success: function (data) {
                       if(data.kq == 1){
                        bien.addClass("ghecontrong");
                        bien.removeClass("ghedangchon");
                       for (i=0; i < mang.length; i++) {
                           if(mang[i]==ma){
                                mang[i]=null;
                                break;
                           }
                       }
                       }
                    }
             });
        });
               $(".chondatve").click(function(){
                    id = $(this).attr("data-id");
                    makh ={{Session::get('makh')}};
                    dodai = mang.length;
                    $.ajax({
                        url: '{{route("chondatve")}}',
                    type: 'POST',
                    data: {
                        _token: '{{csrf_token()}}',
                        ID: id,
                        MANG:mang,
                        MAKH:makh,
                        DODAI:dodai
                    },
                    success: function (data) {
                       location.assign("{{asset('thongtinve')}}/"+id+"/"+makh);
                    }
                    });
               });
});
    </script>
@endsection
