@extends("Admin/Adminlayout")
@section("sidebar")
    @include("/admin/sidebar")
@endsection

@section("content")

    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    <style>
        .content-table{

            border-collapse: collapse;
            margin: 25px 0;
            font-size:0.9em;
            min-width: 500px;
            border-radius: 6px 6px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0,0,0,0.15);
            flex: auto;
        }
        .content-table thead tr{
            background-color: #009879;
            color: #FFFFFF;
            text-align: left;
            font-weight: bold;
        }
        .content-table th,
        .content-table td{
            padding: 12px 15px;
            /*padding: 55px 58px;*/
        }
        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .content-table tbody tr:nth-of-type(even){
            background-color: #f3f3f3;
        }
        .content-table tbody tr:last-of-type{
            border-bottom: 2px solid #009879;
        }
        .content-table tbody tr.active-row{
            font-weight: bold;
            color: #009879;
        }
    </style>


    <div class="card">
        <div class="card-header">
            <h4 class="cart-title">Uye Bilgileri</h4>
        </div>

        <div class="card-body">
            <div class="table content-table"  >
                <table class="table content-table" >
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ad</th>
                        <th scope="col">email</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Oluşturulma zamanı</th>
                                                <th scope="col">İşlem</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <input type="hidden" class="userdelete_val_id" value="{{$user->id}}">
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role==0 ?"Müşteri":"Admin"}}</td>
                            <td>{{$user->created_at}}</td>
                                                        <td style="display:flex">
                                                            <button  type="button" class="btn btn-primary" data-toggle="modal"
                                                                     data-target="#usereditModal{{$user->id}}"><i class="fas fa-edit"> Duzenle   </i>
                                                            </button>
                            {{--                                <div>--}}
                            {{--                                    <button type="button" class="btn btn-primary" data-toggle="modal"--}}
                            {{--                                            data-target="#editModal">--}}
                            {{--                                        Teklifi yaz--}}
                            {{--                                    </button>--}}
                            {{--                                    --}}{{--                            <a href="{{url('edit-questions/'.$quest->id)}}" class="btn btn-primary">Edit </a>--}}
                            {{--                                </div>--}}
                            {{--                            --}}{{--                        <form action="{{route('yonetici-catdelete',$category->id)}}" method="post">--}}
                            {{--                            {{method_field('DELETE')}}--}}
                            {{--                            {{csrf_field()}}--}}
                                                            <button class="btn btn-danger userdeletebtn"> <i class="fa fa-trash"></i>SİL</button></td>
                            <div class="modal fade bd-example-modal-lg" id="usereditModal{{$user->id}}" tabindex="-1"
                                 role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form method="post" action="{{route('user-update',$user->id) }}" enctype="multipart/form-data" >
                                            @method("put")
                                            {{csrf_field()}}
                                            <input type="hidden" name="follow_id" id="follow_id" value="1">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Düzenle
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">&times;
                                                </button>

                                            </div>
                                            <div class="modal-body">
                                                <div class="form-validation">
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <div class="form-group">
                                                                <label class="col-lg-6 col-form-label"
                                                                       for="val-firstname">
                                                                    Rol:
                                                                </label>
                                                                <div class="col-lg-9" >
                                                                    <select  name="role_id"  class="form-control" id="exampleFormControlSelect1">
                                                                        {{--                                                @if($policy->category_id == $category->id)--}}
                                                                        {{--                                                    <option selected value="{{$category->id}}" >{{$category->category_name}}</option>--}}
                                                                        {{--                                                @else--}}
                                                                        {{--                                                    <option value="{{$category->id}}" >{{$category->category_name}}</option>--}}
                                                                        {{--                                                @endif--}}
                                                                        {{--                                                @for($i=0;$i<2;$i++)--}}

                                                                        @if($user->role == 1)
                                                                            <option selected value="1">Admin</option>
                                                                            <option value="0">Müşteri</option>
                                                                        @else
                                                                            <option selected value="0">Müşteri</option>
                                                                            <option value="1">Admin</option>
                                                                        @endif
                                                                        {{--                                                @endfor--}}
                                                                        {{--                                                        <option selected value="{{$user->role}}" >{{$user->role ?"Admin":"Musteri"}}</option>--}}

                                                                        {{--                                                        <option value="{{$user->role}}" >{{$user->role ?"Admin":"Musteri"}}</option>--}}
                                                                        {{--                                               --}}
                                                                        {{--                                                <option value="{{old('role')?? $user->role}}" >Musteri</option>--}}
                                                                        {{--                                                <option value="{{old('role')?? $user->role}}" >Admin</option>--}}
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label"
                                                                       for="val-tc">
                                                                    Mail:
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-9">
                                                                    <input type="email" name="val_email" value="{{old('email')?? $user->email}}" class="form-control"  placeholder="">
                                                                </div>
                                                            </div>


                                                        </div>
                                                        <div class="col-xl-6">
                                                            <div class="form-group row">
                                                                <label class="col-lg-4 col-form-label"
                                                                       for="val-lastname">
                                                                    Ad:
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-lg-9">
                                                                    <input type="text" name="val_name" value="{{old('name')?? $user->name}}" class="form-control"  placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Kaydet</button>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
{{--    <div class="modal fade bd-example-modal-lg" id="usereditModal{{$user->id}}" tabindex="-1"--}}
{{--         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg">--}}
{{--            <div class="modal-content">--}}
{{--                <form method="post" action="{{route('user-update',$user->id) }}" enctype="multipart/form-data" >--}}
{{--                    @method("put")--}}
{{--                    {{csrf_field()}}--}}
{{--                    <input type="hidden" name="follow_id" id="follow_id" value="1">--}}
{{--                    <div class="modal-header">--}}
{{--                        <h5 class="modal-title" id="exampleModalLabel"> Düzenle--}}
{{--                        </h5>--}}
{{--                        <button type="button" class="close" data-dismiss="modal"--}}
{{--                                aria-label="Close">&times;--}}
{{--                        </button>--}}

{{--                    </div>--}}
{{--                    <div class="modal-body">--}}
{{--                        <div class="form-validation">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-xl-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label class="col-lg-6 col-form-label"--}}
{{--                                               for="val-firstname">--}}
{{--                                            Rol:--}}
{{--                                        </label>--}}
{{--                                        <div class="col-lg-9" >--}}
{{--                                            <select  name="role_id"  class="form-control" id="exampleFormControlSelect1">--}}
{{--                                                @if($policy->category_id == $category->id)--}}
{{--                                                    <option selected value="{{$category->id}}" >{{$category->category_name}}</option>--}}
{{--                                                @else--}}
{{--                                                    <option value="{{$category->id}}" >{{$category->category_name}}</option>--}}
{{--                                                @endif--}}
{{--                                                @for($i=0;$i<2;$i++)--}}

{{--                                                @if($user->role == 1)--}}
{{--                                                      <option selected value="1">Admin</option>--}}
{{--                                                    <option value="0">Müşteri</option>--}}
{{--                                                @else--}}
{{--                                                    <option selected value="0">Müşteri</option>--}}
{{--                                                    <option value="1">Admin</option>--}}
{{--                                                @endif--}}
{{--                                                @endfor--}}
{{--                                                        <option selected value="{{$user->role}}" >{{$user->role ?"Admin":"Musteri"}}</option>--}}

{{--                                                        <option value="{{$user->role}}" >{{$user->role ?"Admin":"Musteri"}}</option>--}}
{{--                                               --}}
{{--                                                <option value="{{old('role')?? $user->role}}" >Musteri</option>--}}
{{--                                                <option value="{{old('role')?? $user->role}}" >Admin</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-lg-4 col-form-label"--}}
{{--                                               for="val-tc">--}}
{{--                                            Mail:--}}
{{--                                            <span class="text-danger">*</span>--}}
{{--                                        </label>--}}
{{--                                        <div class="col-lg-9">--}}
{{--                                            <input type="email" name="val_email" value="{{old('email')?? $user->email}}" class="form-control"  placeholder="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}


{{--                                </div>--}}
{{--                                <div class="col-xl-6">--}}
{{--                                    <div class="form-group row">--}}
{{--                                        <label class="col-lg-4 col-form-label"--}}
{{--                                               for="val-lastname">--}}
{{--                                            Ad:--}}
{{--                                            <span class="text-danger">*</span>--}}
{{--                                        </label>--}}
{{--                                        <div class="col-lg-9">--}}
{{--                                            <input type="text" name="val_name" value="{{old('name')?? $user->name}}" class="form-control"  placeholder="">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="modal-footer">--}}
{{--                        <button type="submit" class="btn btn-primary">Kaydet</button>--}}
{{--                    </div>--}}
{{--                </form>--}}


{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    {{--    <div class="modal fade bd-example-modal-lg" id="editModal" tabindex="-1"--}}
    {{--         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
    {{--        <div class="modal-dialog modal-lg">--}}
    {{--            <div class="modal-content">--}}
    {{--                <form action="{{route('questions-update',$quest->id)}}" method="POST">--}}
    {{--                    @method("put")--}}
    {{--                    @csrf--}}
    {{--                    <div class="modal-header">--}}
    {{--                        <h5 class="modal-title" id="exampleModalLabel"> Teklifi Gönder--}}
    {{--                        </h5>--}}
    {{--                        <button type="button" class="close" data-dismiss="modal"--}}
    {{--                                aria-label="Close">&times;--}}
    {{--                        </button>--}}

    {{--                    </div>--}}
    {{--                    <div class="modal-body">--}}
    {{--                        <div class="form-validation">--}}
    {{--                            <div class="row">--}}
    {{--                                <div class="col-xl-6">--}}
    {{--                                    <div class="form-group">--}}
    {{--                                        <label class="col-lg-4 col-form-label"--}}
    {{--                                               for="val-admin_comment">--}}
    {{--                                            Teklif--}}
    {{--                                            <span class="text-danger">:</span>--}}
    {{--                                        </label>--}}
    {{--                                        <div class="col-lg-6">--}}
    {{--                                            <input type="text" class="form-control" value="{{old('admin_comment')?? $quest->admin_comment}}"--}}
    {{--                                                   id="val-admin_comment"--}}
    {{--                                                   name="val-admin_comment"--}}
    {{--                                                   style="color: black;width: 600px" >--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="modal-footer">--}}
    {{--                        <button type="submit" class="btn btn-primary">Gönder</button>--}}
    {{--                    </div>--}}
    {{--                </form>--}}


    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    @if ($users->hasPages())
        <div class="pagination-wrapper">
            {{ $users->links() }}
        </div>
    @endif

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.userdeletebtn').click(function (e) {
                e.preventDefault();
                var delete_id = $(this).closest("tr").find('.userdelete_val_id').val();




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
                                url:"/delete-user/"+delete_id,
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
