<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <form class="form-horizontal" method="get" action="/createPost">
        <div class="col-md-8 col-md-offset-2">
                <textarea class="form-control" name = "title" rows="1" placeholder="Title" required></textarea>
                <textarea class="form-control" name="body" rows="3" placeholder="What are you thinking?" required></textarea>
            <br>
            <div class="btn-group">
                <input type = 'submit' value = "Share"/>
            </div>
            <br><br>
        </div>
    </form>

</div>
    @if ($res)
        @foreach($res as $post)
        <div class="container">
		    <div class="row">
			    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
				    <ul class="event-list">
					    <li>
                            <div class="info">
                                <h2 class="title">{{$post->title}}</h2>
                                <p class="desc">{{$post->body}}</p>
                                <ul>
								    <li style="width:50%;"><a href="#website"> edit </a></li>
                                    <li style="width:50%;"><a href="{!! route('deletePost', ['data'=>$post->id]) !!}"> delete </a></li>
							    </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>                         
        @endforeach
    @endif
@endsection