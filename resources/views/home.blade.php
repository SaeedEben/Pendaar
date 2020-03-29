@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Home</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Welcome!<br>

                        <ul style="display: inline; list-style-type: none; margin-left: 5%;">
                            <li style="display: inline">
                                <button type="button" class="btn btn-outline-info">
                                    <a href="{{url('/pendaar')}}" style="text-decoration: none;">Make History</a>
                                </button>
                            </li>
                            <li style="display: inline">
                                <button type="button" class="btn btn-outline-info">
                                    <a href="{{url('/pendaar/post')}}" style="text-decoration: none;">Followed
                                        History</a>
                                </button>
                            </li>
                            <li style="display: inline">
                                <button type="button" class="btn btn-outline-info">
                                    <a href="{{url('/pendaar/post/own')}}" style="text-decoration: none;">Your
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
