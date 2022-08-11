@extends('layouts.app')
@section('content')
<section>

    <div class="container">
        <div class="row text-center md-2 mt-md-5">
            <h3> محصولات</h3>
        </div>
        <div class="row">
            <div class="row @auth  col-md-9 @else col-md-12 @endauth">
                @foreach($products as $product)
                    <div  class="card col-md-4" >
                        <div id="{{$product->id}}" class="card-body">
                            <h5 class="card-title">{{$product->fabric->title}}</h5>
                            <p class="card-text ">{{$product->fabric->category->description}}</p>
                            <p class="card-text code">کد: {{$product->color_code}}</p>
                            <div class="row">
                                <p class="card-text col-md-3 ">رنگ:</p>
                                <div class="mb-2 col-md-2"   style=" width: 2rem ;background:{{$product->color_hex}}">
                                    .
                                </div>
                            </div>

                            <a href=@guest()"{{route('login')}} " @else"#" @endguest class="btn btn-primary @auth add @endauth">افزودن به سبد خرید</a>
                        </div>

                    </div>
                @endforeach
            </div>
            @auth
                <div class="card col-md-3" style="height: 25rem;">
                    <div class="card-body">
                        <h5 class="card-title">سبد خرید</h5>
                        <h6 class="card-subtitle mb-2 text-muted">لیست</h6>
                        <ul class="list-group list-group-flush">
                            @if(cache()->has('ids'))
                                @php
                                        $ids=cache()->get('ids');
                                @endphp
                                @foreach($ids as $id)
                                    @php
                                    $product=\App\Models\product::where('id',$id[0])->first();
                                        //dd($product);
                                    @endphp
                                <li id="{{$id[0]}}" class="list-group-item">
                                    <div class="row justify-content-between">
                                        <button id="plus{{$id[0]}}" type="button" class="btn btn-primary btn-sm col-md-2 increase" style="height: 2rem;">+</button>
                                        <div class="text-center alert alert-light col-md-5 pt-0" style="height: 2rem" role="alert">{{$product->fabric->title.' کد'.$product->color_code}}</div>
                                        <div id="count{{$id[0]}}" class="text-center count alert alert-success col-md-3 pt-0" style="height: 2rem" role="alert">{{$id[1]}}</div>
                                        <button id="less{{$id[0]}}" type="button" class=" btn btn-secondary btn-sm col-md-2 decrease" style="height: 2rem;">-</button>
                                    </div>
                                </li>
                                @endforeach
                            @endif
                        </ul>
                        <a id="finish" class="btn btn-primary w-100 mt-5" href="{{route('front.order')}}" role="button">نهایی کردن سبد خرید</a>
                        <a id="deleteList" class="btn btn-danger mt-2 w-100" href="#" role="button">حذف تمام موارد</a>


                    </div>
                </div>
            @endauth
        </div>
    </div>

</section>

<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/query.js')}}"></script>
@endsection
