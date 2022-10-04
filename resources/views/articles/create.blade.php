@extends('layouts.app')
@inject('model','App\Models\Article')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Create Article') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('articles.store')}}" files="true" enctype="multipart/form-data">
                            @csrf
                            @include('articles.form')

                            <div class="row mb-0">

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
