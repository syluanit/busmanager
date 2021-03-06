@extends("quantrivien.main")
@section("content")
    <div class="content tramdung row show" style="overflow: hidden; position: relative; padding: 3em 1em 1em;">
        <h4 style="padding: .5em; position: absolute; top: 0; left: 0; width: 100%;">Bảng Trạm Dừng</h4>
        <div id="busstop"></div>
        <a href="javascript:void(0)" onclick="window.open('{{url("admin/addtramdung")}}')" style="padding: .2em 1em; line-height: 2em; background: white; font-size: 1em; position: absolute; top: .2em; right: 9em; box-shadow: 0 0 5px black;" title="Thêm Trạm Dừng">
            <i class="glyphicon glyphicon-plus"></i>Thêm
        </a>
        <a href="javascript:void(0)" onclick="refreshTD()" style="padding: .2em 1em; line-height: 2em; background: white; font-size: 1em; position: absolute; top: .2em; right: 2em; box-shadow: 0 0 5px black;" title="Làm Mới">
            <i class="glyphicon glyphicon-refresh"></i>Refresh
        </a>
    </div>
@endsection
@section("excontent")
    <div class="modal fade" id="viewmap">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tên Trạm Dừng</h4>
                </div>
                <div class="modal-body" style="height: 600px">
                </div>
                <div class="modal-footer">
                    <span class="btn btn-danger" data-dismiss="modal" data-target="#viewmap">Close</span>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    <script>
        option = document.getElementsByClassName("option");
        for (var i = 0; i < option.length; i++) {
            option[i].classList.remove('selected');
        }
        option[7].classList.add('selected');
        option[7].getElementsByTagName('img')[0].setAttribute('src','{{asset("images/icons/parking-hover.png")}}');
        $(function () {
            var obj = {
                width: '100%',
                height: '100%',
                showTop: false,
                showBottom: false,
                collapsible: false,
                showHeader: true,
                filterModel: {on: true, mode: "AND", header: true},
                scrollModel: {autoFit: true},
                resizable: false,
                roundCorners: false,
                rowBorders: true,
                postRenderInterval: -1,
                hwrap: true,
                columnBorders: false,
                selectionModel: { type: 'row', mode: 'single' },
                hoverMode: 'row',
                numberCell: { show: true, title: 'STT', width: 50, align: 'center'},
                stripeRows: true,
                cellDblClick: function (event,ui) {
                    window.open("{{url('/admin/addtramdung')}}" + "/" + ui.rowData["Mã"]);
                }
            };
            obj.colModel = [
                {
                    title: "Tên",
                    width: 200,
                    dataIndx: "Tên",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Tọa độ",
                    width: 70,
                    dataIndx: "Tọa_độ",
                    dataType: "string",
                    editor: false,
                    align: "center",
                    render: function(ui){
                        var str = "<a href='javascript:void(0)' data-toggle='modal' data-target='#viewmap' onclick='openmap("+ui.rowData['Tọa_độ']+")' title='Xem vị trí'><i class='glyphicon glyphicon-eye-open' style='color: #00bf00;'></i></a>";
                        return str;
                    }
                },
                {
                    title: "Nhân viên tạo",
                    width: 170,
                    dataIndx: "Nhân_viên_tạo",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Nhân viên chỉnh sửa",
                    width: 170,
                    dataIndx: "Nhân_viên_chỉnh_sửa",
                    dataType: "string",
                    editor: false,
                    align: 'center',
                    filter: {
                        type: 'textbox',
                        condition: 'contain',
                        listeners: ['keyup']
                    }
                },
                {
                    title: "Thao tác",
                    width: 100,
                    editor: false,
                    dataIndx: "View",
                    align: 'center',
                    render: function (ui) {
                        var str = '';
                        str += '<a title="Edit" id="idEditBusStop" ><i class="glyphicon glyphicon-edit  text-success" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        str += '<a title="Delete" id="idDelBusStop" ><i class="glyphicon glyphicon-remove  text-danger" style="padding-right: 5px; cursor: pointer;"></i></a>';
                        return str;
                    },
                    postRender: function (ui) {
                        var rowData = ui.rowData,
                            $cell = this.getCell(ui);
                        //add button
                        $cell.find("a#idEditBusStop")
                            .unbind("click")
                            .bind("click", function (evt) {
                                window.open("{{url('admin/addtramdung')}}"+"/"+rowData["Mã"]);
                            });
                        $cell.find("a#idDelBusStop")
                            .unbind("click")
                            .bind("click", function (evt) {
                                if(confirm("Bạn chắc chắn muốn xóa?"))
                                    location.assign("{{url('admin/deltramdung')}}"+"/"+rowData["Mã"]);
                            });
                    }
                }
            ];

            obj.dataModel = {
                data: {!! json_encode($busstop) !!},
                location: "local",
                sorting: "local",
                sortDir: "down"
            };
            obj.pageModel = {type: 'local', rPP: 20, rPPOptions: [20, 30, 40, 50]};
            var $grid = $("#busstop").pqGrid(obj);
            $grid.pqGrid("refreshDataAndView");
        });
        function refreshTD(){
            $("#busstop").pqGrid("reset",{filter : true});
        }
        function openmap(x,y){
            var mapOptions = {
                center: new google.maps.LatLng(x, y),
                zoom: 16,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(x, y)
            });
            var map = new google.maps.Map(document.getElementById("viewmap").getElementsByClassName("modal-body")[0],mapOptions);
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDPoe4NcaI69_-eBqxW9Of05dHNF0cRJ78"></script>
@endsection
