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
            <h4 class="cart-title">İletişeme Gecen İnsanlar</h4>
        </div>

        <div class="card-body">
            <div class="table content-table"  >
                <table class="table content-table" >
                    <thead>
                    <tr>

                        <th scope="col">Ad</th>
                        <th scope="col">Soyad</th>
                        <th scope="col">Telefon no</th>
                        <th scope="col">email</th>
                        <th scope="col">mesaj</th>
                        <th scope="col">Oluşturulma zamanı</th>
                        <th scope="col">İşlem</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contacts as $contact)
                        <tr>
                            <input type="hidden" class="contactdelete_val_id" value="{{$contact  ->id}}">
                            <td>{{$contact->firstname}}</td>
                            <td>{{$contact->lastname}}</td>
                            <td>{{$contact->mobile}}</td>
                            <td>{{$contact->email}}</td>
                            <td>{{$contact->message}}</td>
                            <td>{{$contact->created_at}}</td>
                            <td style="display:flex">
                                <button class="btn btn-danger contactdeletebtn"> <i class="fa fa-trash">SİL</i></button>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>

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
        @if ($contacts->hasPages())
            <div class="pagination-wrapper">
                {{ $contacts->links() }}
            </div>
        @endif

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.contactdeletebtn').click(function (e) {
                e.preventDefault();
                var delete_id = $(this).closest("tr").find('.contactdelete_val_id').val();




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
                                url:"/delete-contact/"+delete_id,
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
