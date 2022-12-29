@extends("Admin/Adminlayout")
@section("sidebar")
    @include("/admin/sidebar")
@endsection

@section("content")

    <div class="container">
        <h3>Poliçeler</h3>
        <a class="btn btn-primary float-right mb-4 " href="{{ route('yonetici-create')}}"> <i class="fa-sharp fa-solid fa-circle-plus"> Police ekle</i></a>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori</th>
                <th scope="col">police adı</th>
                <th scope="col">premium</th>
                <th scope="col">Kul_suresi</th>
                <th scope="col">İşlem</th>
            </tr>
            </thead>
            <tbody>
            @foreach($policyies as $policy)

                <tr>
                    <input type="hidden" class="servicedelete_val_id" value="{{$policy->id}}">
                    <th scope="row">{{$policy->id}}</th>
                    <td>{{$policy->category->category_name}}</td>
                    <td>{{$policy->policy_name}}</td>
                    <td>{{$policy->premium}}</td>
                    <td>{{$policy->Kul_suresi}}</td>


                    <td style="display:flex">

                            <button  type="button" class="btn btn-primary" data-toggle="modal"
                                     data-target="#policyeditModal{{$policy->id}}"><i class="fas fa-edit"> Duzenle   </i>
                            </button>

                        {{--                        <form action="{{route('yonetici-delete',$policy->id)}}" method="post">--}}
                        {{--                            {{method_field('DELETE')}}--}}
                        {{--                            {{csrf_field()}}--}}
                        <button class="btn btn-danger servicedeletebtn"> <i class="fa fa-trash"></i>SİL</button>
                        {{--                            <button class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()">--}}
                        {{--                                <i class="fa fa-archive"></i>--}}
                        {{--                                Archive--}}
                        {{--                            </button>--}}
                        {{--                            <button class="btn btn-danger " type="submit">Sil</button>--}}
                        {{--                        </form>--}}
                    </td>
                </tr>
                <div class="modal fade bd-example-modal-lg" id="policyeditModal{{$policy->id}}" tabindex="-1"
                     role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form method="post" action="{{route('yonetici-update',$policy->id) }}" enctype="multipart/form-data" >
                                @method("put")
                                {{csrf_field()}}

                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1"> Düzenle
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
                                                    <label class="col-lg-3 col-form-label"
                                                           for="val-category">
                                                        Kategori:
                                                    </label>
                                                    <div class="col-lg-9" >
                                                        <select  name="category_id"  class="form-control" id="exampleFormControlSelect3">
                                                            @foreach($categories as $category)
                                                                @if($policy->category_id == $category->id)
                                                                    <option selected value="{{$category->id}}" >{{$category->category_name}}</option>
                                                                @else
                                                                    <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label"
                                                           for="val-tc">
                                                        Premium:
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9">
                                                        <input type="number" name="premium" value="{{old('premium')?? $policy->premium}}" class="form-control"  placeholder="">
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label"
                                                           for="val-lastname">
                                                        Poliçe Adı:
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9">
                                                        <input type="text" name="policy_name" value="{{old('policy_name')?? $policy->policy_name}}" class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label"
                                                           for="val-plaka">
                                                        Kullanılma Süresi:
                                                        <span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-9">
                                                        <input type="number"  name="Kul_suresi"value="{{old('Kul_suresi')?? $policy->Kul_suresi}}"  class="form-control"  placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button  class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            @endforeach
            </tbody>
        </table>

        @if ($policyies->hasPages())
            <div class="pagination-wrapper">
                {{ $policyies->links() }}
            </div>
        @endif
    </div>







@endsection
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@section('scripts')
    <script>
        $(document).ready(function () {
            $('.servicedeletebtn').click(function (e) {
                e.preventDefault();
                var delete_id = $(this).closest("tr").find('.servicedelete_val_id').val();




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
                                url:"/delete-policy/"+delete_id,
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

