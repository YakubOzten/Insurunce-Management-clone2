@extends("Admin/Adminlayout")
@section("sidebar")
    @include("/admin/sidebar")
@endsection
@section("content")
{{--    @if (\Session::has('success'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <ul>--}}
{{--                <li>{!! \Session::get('success') !!}</li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"--}}
{{--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    <div class="container py-1">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white"> Bekleyen Başvurular </h4>


                        <a style="padding: 5px; border-bottom-width: 5px;border-bottom-left-radius: 15px;float: right;" href="{{route('finish-app')}}" class="btn btn-warning float-end">Onaylanmiş <br/>
                            Başvurulara Git!</a>

                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped" style="width:100%;">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Başvuru Tarihi</th>
                                <th>Poliçe Adı</th>
                                <th>Müşteri Adı</th>
                                <th>Başvuru Durumu</th>
                                <th>İşlem</th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pols as $item)
                                <tr>
                                    <input type="hidden" class="appdelete_val_id" value="{{$item->id}}">
                                    @if($item->status == '0')
                                    <td class="policy_id" id="policy_id{{$item->id}}"  scope="row">{{$item->id}}</td>
                                    <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                                    <td>{{$item->policy->policy_name}}</td>
                                    <td>{{$item->getuser->name}}</td>

                                    <td>{{$item->status =='0' ? 'Bekliyor' : 'Tamamlandı'}}</td>

                                    <td style="display:flex">

                                        <button  type="button" onclick="UpStatus('{{$item->id}}')"
                                                 class="btn btn-primary me-3   float-start"> <i class="fa-sharp fa-solid fa-thumbs-up" >  onayla</i></button>
                                        <button class="btn btn-danger appdeletebtn"> <i class="fa fa-trash"></i>SİL</button>
                                    </td>
                                        @endif
{{--<td>--}}
{{--                                      <form action="{{route('pol-update',$item->id)}}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('PUT')--}}
{{--
{{--                                            <button  type="submit" class="btn btn-primary   ">Güncelle</button>--}}
{{--                                        </form>--}}

{{--                                    </td>--}}
                                </tr>
                            @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.appdeletebtn').click(function (e) {
                e.preventDefault();
                var delete_id = $(this).closest("tr").find('.appdelete_val_id').val();




                swal({
                    title: "Silmek istediğinize emin misiniz?",
                    text: "Bu işlemi geri alamazsınız!",
                    icon: "warning",
                    type: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                    .then((willDelete) => {
                        if (willDelete) {


                            $.ajax({
                                type:"DELETE",
                                url:"/delete-app/"+delete_id,
                                data: {
                                    "delete_id":delete_id,
                                    "_token": "{{ csrf_token() }}"
                                },
                                success: function (response){
                                    swal("Silindi !!", "Kayıt Silindi !!", "success", {
                                        icon: "success",
                                    })
                                        .then((result) => {
                                            location.reload();

                                        });
                                }
                            })

                        }
                    });
            });
        });
    </script>
@endsection




@section('scripts')
    <script>

        function UpStatus(id){
            var policy_id = $("#policy_id"+id).text();

            $.ajax({
                method: "POST",
                url: "{{route("pol-update")}}",
                data: {
                    'policy_id':policy_id,
                    "_token": "{{ csrf_token() }}",

                },
                success: function (response) {
                    swal(response.status);
                    window.location.reload();
                }, error: function (response) {
                    alert(response.status);
                }

            });

        }


    </script>
@endsection
