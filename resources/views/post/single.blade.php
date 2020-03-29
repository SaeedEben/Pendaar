@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$post['user']['full_name']}} Post</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <br>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"
                                   placeholder="title" value="{{$post['title']}}" disabled>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input class="form-control" name="category" value="{{$post['category']}}" disabled>

                        </div>
                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" rows="3" name="body" disabled>{{$post['body']}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Tags</label>
                            <input type="text" name="tags" class="form-control"
                                   placeholder="#" value="{{$output}}" disabled>
                        </div>


                        <ul style="display: inline; list-style-type: none; margin-left: 5%;">
                            <li style="display: inline">
                                <button type="button" class="btn btn-secondary">
                                    <a href="{{url('/pendaar')}}" style="text-decoration: none;  color: #1d2124;">Make
                                        History</a>
                                </button>
                            </li>
                            <li style="display: inline">
                                <button type="button" class="btn btn-secondary">
                                    <a href="{{url('/pendaar/post')}}" style="text-decoration: none; color: #1d2124;">Followed
                                        History</a>
                                </button>
                            </li>
                            <li style="display: inline">
                                <button type="button" class="btn btn-secondary">
                                    <a href="{{url('/pendaar/post/own')}}"
                                       style="text-decoration: none; color: #1d2124;">Your
                                        History</a>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
