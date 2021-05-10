@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="modal-body">
                <!-- Project Details Go Here-->
                <h2 class="text-uppercase">{{$model->title}}</h2>
                <p id="viewNumber">Lượt xem: {{$totalViews}}</p>
                <img class="img-fluid d-block mx-auto" src="{{asset($model->image)}}" alt="" width="50%">
                <div class="text-decoration-none">
                    <p>{!!$model->content!!}</p>
                </div>
                <ul class="list-inline">
                    <li>Date: January 2020</li>
                    <li>Tác giả: {{$model->author}}</li>
                    <li>Dòng: {{$model->category->name}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-script')
<script>
    let increaseViewUrl = "{{route('post.tangView')}}";
    const data = {
        id: {
            {
                $model - > id
            }
        },
        _token: "{{csrf_token()}}"
    };
    setTimeout(() => {
        fetch(increaseViewUrl, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
            .then(responseData => responseData.json())
            .then(postObj => {
                console.log(postObj);
            })
    }, 3000);
</script>
@endsection