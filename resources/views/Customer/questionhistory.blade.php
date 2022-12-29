@extends("layout")
@section("sidebar")
    @include("/Customer/sidebar")
@endsection

@section("content")

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Poliçe Tekliflerim</h4>
                            {{--                            <p class="card-category"> Here is a subtitle for this table</p>--}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">

                                    <tr>
                                        <th scope="col">Kategorisi</th>
                                        <th scope="col">Admin mesajı </th>
                                        <th scope="col">Gelen teklif zamanı</th>
                                        <th scope="col">Teklif Gönderilen zaman</th>

                                    </tr></thead>
                                    <tbody>

                                    @foreach($quests as $quest)
                                        @if(Auth::id()==$quest->user_id)
                                            <tr>
                                                @if($quest->sfollow_id==1)
                                                    <th> Kasko</th>
                                                @elseif($quest->sfollow_id==2)
                                                    <th> Sağlık</th>
                                                @elseif($quest->sfollow_id==3)
                                                    <th> Trafık</th>
                                                @elseif($quest->sfollow_id==4)
                                                    <th> Deprem</th>
                                                @elseif($quest->sfollow_id==5)
                                                    <th> Konut</th>
                                                @endif

                                                <td>{{$quest->admin_comment == null ? "Teklif henüz verilmedi":"$quest->admin_comment"}}</td>
                                                <td>{{$quest->updated_at ==$quest->created_at ? "Teklif daha gelmedi":$quest->updated_at->diffForHumans()}}</td>
                                                {{--                        <td>{{$quest->updated_at->isoFormat('dddd D/M/Y ')}}</td>--}}
                                                {{--                        <td>{!! date('d/m/y ',strtotime($quest->updated_at)) !!}</td>--}}
                                                {{--                        <td>{!!   date('d/m/y ',strtotime($quest->created_at)) !!}</td>--}}
                                                <td> {{$quest->created_at}}</td>
                                                {{--                        <td>{{$quest->updated_at->diffInDays()}}</td>--}}

                                            </tr>
                                        @endif
                                    @endforeach




                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="container ">--}}
{{--        <div class="panel panel-primary ">--}}
{{--            <div class="panel-heading">--}}
{{--                <h6 class="panel-title">Poliçe Tekliflerim</h6>--}}
{{--            </div>--}}
{{--            <h3></h3>--}}
{{--            --}}{{--        <a class="btn btn-primary float-right mb-4" href="{{ route('yonetici-create')}}">Add product</a>--}}
{{--            <table class="table table-bordered "   >--}}
{{--                <thead>--}}
{{--                <tr>--}}
{{--                    <th scope="col">Kategorisi</th>--}}
{{--                    <th scope="col">Admin mesajı </th>--}}
{{--                    <th scope="col">Gelen teklif zamanı</th>--}}
{{--                    <th scope="col">Teklif Gönderilen zaman</th>--}}

{{--                </tr>--}}
{{--                </thead>--}}
{{--                @foreach($quests as $quest)--}}
{{--                     @if(Auth::id()==$quest->user_id)--}}
{{--                    <tr>--}}
{{--                        @if($quest->sfollow_id==1)--}}
{{--                            <th> Kasko</th>--}}
{{--                        @elseif($quest->sfollow_id==2)--}}
{{--                            <th> Sağlık</th>--}}
{{--                        @elseif($quest->sfollow_id==3)--}}
{{--                            <th> Trafık</th>--}}
{{--                        @elseif($quest->sfollow_id==4)--}}
{{--                            <th> Deprem</th>--}}
{{--                        @elseif($quest->sfollow_id==5)--}}
{{--                            <th> Konut</th>--}}
{{--                        @endif--}}

{{--                        <td>{{$quest->admin_comment == null ? "Teklif henüz verilmedi":"$quest->admin_comment"}}</td>--}}
{{--                        <td>{{$quest->updated_at ==$quest->created_at ? "Teklif daha gelmedi":$quest->updated_at->diffForHumans()}}</td>--}}
{{--                        <td>{{$quest->updated_at->isoFormat('dddd D/M/Y ')}}</td>--}}
{{--                        <td>{!! date('d/m/y ',strtotime($quest->updated_at)) !!}</td>--}}
{{--                        <td>{!!   date('d/m/y ',strtotime($quest->created_at)) !!}</td>--}}
{{--                            <td> {{$quest->created_at}}</td>--}}
{{--                        <td>{{$quest->updated_at->diffInDays()}}</td>--}}

{{--                    </tr>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
{{--            </table>--}}

{{--        </div>--}}
{{--    </div>--}}




    </div>
{{--    @if ($policyies->hasPages())--}}
{{--        <div class="pagination-wrapper">--}}
{{--            {{ $policyies->links() }}--}}
{{--        </div>--}}
{{--        @endif--}}
        </div>


        @endsection
