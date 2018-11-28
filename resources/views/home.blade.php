<html>
<head>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type = "text/javascript" src="{{ asset('js/ajax.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >
 
</head>
 <body >
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DashBoard
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!!
                </div>
            </div>
        </div>
    </div>

    @if ($data['gen'] == 'unknown')
    <form class="form-horizontal" method="get" action="/updateGender">
        Select Gender:
        <label><input type="radio" name="gender" value="male" required>Male</label>
        <label><input type="radio" name="gender" value="female">Female</label>
        <input type="submit">
    </form>
    @else
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
    @if ($data['res'])
        @foreach($data['res'] as $post)
        <div class="container">
		    <div class="row">
			    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ]">
				    <ul class="event-list">
					    <li class="<?php echo $post->id; ?>">
                            <div class="info" name="info">
                                <h2 class="title" name="tit">{{$post->title}}</h2>
                                <p class="desc" name="desc">{{$post->body}}</p>
                                <ul>
                                    <li width='50%'><button  class="delete" id="<?php echo $post->id; ?>"> delete </button></li>
							    </ul>
                                <form class="formComment" name="<?php echo $post->title ; ?>" id="<?php echo $post->id ; ?>" action="#">
                                    <textarea class="form-control" name = "com" rows="1" placeholder="Comment"></textarea>
                                    <li ><input type="submit" class="comment" > comment </input></li>
                                    <br>
                                </form>
                            </div>
                            <form class="formEditPost"  id="<?php echo $post->id ; ?>">
                                    <textarea class="form-control" name = "edittitle" rows="1" placeholder="new title"></textarea>
                                    <textarea class="form-control" name = "editbody" rows="3" placeholder="new body"></textarea>
                                    <li ><button type="submit"> edit </button></li>
                            </form>
                        </li>
                        <br id="br1"><br id="br1"><br id="br1"><br id="br1"><br id="br1"><br id="br1">
                    </ul>
                    @if ($data['coms'])
                        <div class="<?php echo $post->id; ?>">
                        @foreach($data['coms'] as $comment)
                            @if ($comment->Ptitle == $post->title)
                                <h5>{{$comment->comment}}</h5>
                            @endif
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>                         
        @endforeach
    @endif
    @endif    
@endsection
</body>
</html>