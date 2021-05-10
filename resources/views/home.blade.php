@extends('layouts.main')
@section('content')
<div class="text-center">
    <h2 class="section-heading text-uppercase">Sản phẩm</h2>
    <h3 class="section-subheading text-muted">Sản phẩm vừa ra mắt</h3>
</div>
<div class="row">
    @foreach ($posts as $item)
    <div class="col-lg-4 col-sm-8 mb-4">
        <div class="portfolio-item">
            <a class="portfolio-link" href="{{route('post.detail',$item->id)}}">
                <img class="img-fluid" src="{{$item->image}}" alt="" />
            </a>
            <div class="portfolio-caption">
                <a href="{{route('post.detail',$item->id)}}">
                    <div class="portfolio-caption-heading">{{$item->title}}</div>
                </a>
                <div class="portfolio-caption-subheading text-muted">Dòng: {{$item->category->name}}</div>
                <a class="button" href="{{route('post.detail',$item->id)}}">Read More <i class="ti-arrow-right"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection