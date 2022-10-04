@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All Article') }}</div>
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Photo</th>
                                <th scope="col">Description</th>
                                <th scope="col">Date Of Creation</th>
                                <th scope="col">Author</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($articles as $article)

                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$article->title}}</td>
                                    <td><img src="{{$article->photo}}" alt="{{$article->title}}" width="50"></td>
                                    <td>{{Str::limit($article->description,50,'..')}}</td>
                                    <td>{{$article->created_at->format('D / m / Y')}}</td>
                                    <td>{{$article->user->first_name ?? 'No User'}}</td>
                                    @if(auth()->user())
                                    <td>
                                        {!! Form::open([
                                            'route' => ['articles.destroy',$article->id],
                                            'method' => 'delete'
                                        ])!!}
                                        <a href="{{route('articles.edit',$article->id)}}" class="btn btn-success">Edit</a>

                                        <button class="btn btn-danger" onclick="return confirm('Are you sure to delete');">Delete</button>
                                        {!! Form::close() !!}
                                    </td>
                                    @else
                                        <td><a href="{{route('login')}}">Login now first</a> </td>
                                        @endif
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>

@endsection
