@extends('backend.layouts.main')
@section('page-title','Quản lý sản phẩm')
@section('content')
<div class="container">
    <table id="example2" class="table table-striped table-light" role="grid" aria-describedby="example2_info">
        <thead>
            <tr class="table table-striped">
                <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tiêu đề</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ảnh</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Danh mục</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Tác giả</th>
                <!-- <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Mô tả ngắn</th> -->
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                    <a href="{{route('post.create')}}" class="fa fa-plus-square btn btn-primary"> Add new</a>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $item)
            <tr class="table table-striped">
                <td class="sorting_1">{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>
                    <img src="{{asset($item->image)}}" width="70">
                </td>
                <td>{{$item->category->name}}</td>
                <td>{{$item->author}}</td>
                <!-- <td>{!!$item->short_desc!!}</td> -->
                <td>
                    <div class="btn-control">
                        <a href="{{route('post.edit',['id' => $item->id])}}" class="btn btn-sm btn-info">Edit</a>
                        <a onclick="return confirm('Bạn chắc chắn xóa')" href="{{route('post.destroy',['id' => $item->id])}}" class="btn btn-sm btn-danger">Remove</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col-xs-4 offset-xs-8 pull-right">
        {{$posts->links()}}
    </div>
</div>
@yield('page-script')
@endsection