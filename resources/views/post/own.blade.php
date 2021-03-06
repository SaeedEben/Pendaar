@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center"> History for You!</h4>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br>

                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Handle</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($index as $key => $input)
                                <tr>
                                    <th scope="row">{{$key + 1}}</th>
                                    <td>{{$input['title']}}</td>
                                    <td>{{$input['category']}}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning">
                                            <a href="/pendaar/post/{{$input['id']}}"
                                               class="text-decoration-none"
                                               style="color: #1b1e21">See</a>
                                        </button>

                                        <form method="POST" action="/pendaar/post/{{$input['id']}}"
                                              style="display:inline;">
                                            <button type="submit" class="btn btn-danger">
                                                Delete
                                            </button>
                                            @csrf
                                            @method('delete')
                                        </form>

                                        <button type="submit" class="btn btn-info">
                                            <a href="/pendaar/post/{{$input['id']}}/update" class="text-decoration-none"
                                               style="color: #1b1e21">Update</a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                        {!!  $index->render() !!}
                    </div>
                    <ul style="display: inline; list-style-type: none; margin-left: 5%;">
                        <li style="display: inline">
                            <button type="button" class="btn btn-secondary">
                                <a href="{{url('/pendaar')}}" style="text-decoration: none; color: #1d2124;">Make
                                    History</a>
                            </button>
                        </li>
                        <li style="display: inline">
                            <button type="button" class="btn btn-secondary">
                                <a href="{{url('/pendaar/post')}}" style="text-decoration: none;  color: #1d2124;">Followed
                                    History</a>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
