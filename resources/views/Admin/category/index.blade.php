@extends("Admin/Adminlayout")
@section("sidebar")
    @include("/admin/sidebar")
@endsection

@section("content")

    {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"--}}
    {{--          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">--}}
    <div class="container">

        <h3>Kategoriler</h3>

        <button  type="button" class=" btn btn-primary float-right mb-4" data-toggle="modal"
                 data-target="#catcreateModal"><i class="fa-sharp fa-solid fa-circle-plus"> Kategori Ekle</i>
        </button>

        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Categoriler</th>
                <th scope="col">Olusturulma zamanı</th>
                <th scope="col">İşlem</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <input type="hidden" class="catdelete_val_id" value="{{$category->id}}">
                    <th scope="row">{{$category->id}}</th>
                    <td>{{$category->category_name}}</td>

{{--                    <td><img height="60px" src="{{asset('/storage/images/Categories/'.$category->image)}}"></td>--}}
                    <td>{{$category->created_at}}</td>
                    <td style="display:flex">
                        <button  type="button" class="btn btn-primary" data-toggle="modal"
                                 data-target="#cateditModal{{$category->id}}"><i class="fas fa-edit"> Duzenle   </i>
                        </button>


                            <button class="btn btn-danger catdeletebtn"> <i class="fa fa-trash"></i>SİL</button>
                        <div class="modal fade bd-example-modal-lg" id="cateditModal{{$category->id}}" tabindex="-1"
                             role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form method="post" action="{{route('yonetici-catupdate',$category->id) }}" >
                                        @method("put")
                                        @csrf

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
                                                            <label class="col-lg-5 col-form-label"
                                                                   for="val-firstname">
                                                                Categori ismi:
                                                            </label>
                                                            <div class="col-lg-12" >
                                                                <input type="text" name="category_name" value="{{old('category_name')?? $category->category_name}}" class="form-control"  placeholder="">                                        </div>
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
            </tbody>
        </table>
    </div>


    <div class="modal fade bd-example-modal-lg" id="catcreateModal" tabindex="-1"
         role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="{{route('yonetici-c_createall') }}"enctype="multipart/form-data">
                    @csrf
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
                                        <label class="col-lg-5 col-form-label"
                                               for="val-firstname">
                                            Categori ismi:
                                        </label>
                                        <div class="col-lg-12" >
                                            <input type="text" name="category_name" class="form-control"  placeholder="">                                        </div>
                                    </div>



                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ekle</button>
                    </div>
                </form>


            </div>
        </div>
    </div>



    @if ($categories->hasPages())
        <div class="pagination-wrapper">
            {{ $categories->links() }}
        </div>
    @endif

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.catdeletebtn').click(function (e) {
                e.preventDefault();
                var delete_id = $(this).closest("tr").find('.catdelete_val_id').val();




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
                                url:"/delete-cat/"+delete_id,
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
