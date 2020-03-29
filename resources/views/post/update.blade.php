@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center">Make History!</h4>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <br>

                        @if($errors->any())
                            <h4 style="color:red;">{{$errors->first()}}</h4>
                        @endif

                        <form method="POST" action="{{url('pendaar/post')}}">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control"
                                       placeholder="title" value="{{$post['title']}}">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    <option selected>{{$post['category']}}</option>
                                    <option>{{$category[0]}}</option>
                                    <option>{{$category[1]}}</option>
                                    <option>{{$category[2]}}</option>
                                    <option>{{$category[3]}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Body</label>
                                <textarea class="form-control" rows="3" name="body">{{$post['body']}}</textarea>
                            </div>

                            <div class="form-group">
                                <label>Tags</label>
                                <input type="text" name="tags" class="form-control"
                                       placeholder="#" value="{{$output}}">
                            </div>

                            <button type="submit" class="btn btn-warning">Update</button>
                        </form>

                    </div>
                    <ul style="display: inline; list-style-type: none; margin-left: 5%;">
                        <li style="display: inline">
                            <button type="button" class="btn btn-secondary">
                                <a href="{{url('/pendaar/post')}}" style="text-decoration: none; color: #1d2124;">Followed
                                    History</a>
                            </button>
                        </li>
                        <li style="display: inline">
                            <button type="button" class="btn btn-secondary">
                                <a href="{{url('/pendaar/post/own')}}" style="text-decoration: none; color: #1d2124;">Your
                                    History</a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
