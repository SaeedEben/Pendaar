@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #AFD275">Home</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Welcome!<br>

                        <ul style="display: inline; list-style-type: none; margin-left: 5%;">
                            <li style="display: inline">
                                <button type="button" class="btn btn-outline-info">Make History
                                </button>
                            </li>
                            <li style="display: inline">
                                <button type="button" class="btn btn-outline-info">Your History
                                </button>
                            </li>
                            <li style="display: inline">
                                <button type="button" class="btn btn-outline-info">Followed History
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
