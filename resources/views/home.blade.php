
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}" >

<script type="text/javascript">
        $(document).ready(function() {
            $(".delbutton").click(function() {
                alert("ghfghch");
                var id = $(this).attr("id");
                if (confirm("Sure you want to delete this post? This cannot be undone later.")) {
                    $.ajax({
                        type : "get",
                        url : "/deletePost", //URL to the delete php script
                        data : ({
                            id:id
                        }),
                        success : function() {
                        }
                    });
                    $(this).parents(".record").animate("fast").animate({
                        opacity : "hide"
                    }, "slow");
                }
                return false;
            });
        });
        
        
        function edit(boo) {
            //var bool = document.getElementById("editbtn").name;
            //alert(bool)
            if(boo == 1)
                document.getElementById("editform").style.display="none";
            else
                document.getElementById("editform").style.display="block";
                //document.getElementById("br1").style.display="none";    
        }
 </script>
@extends('layouts.app')
@section('content')
<body >
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

                    You are logged in!
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
					    <li>
                            <div class="info">
                                <h2 class="title">{{$post->title}}</h2>
                                <p class="desc">{{$post->body}}</p>
                                <ul>
								    <li width='50%'><a id="editbtn" name="<?php echo $post->id ?>" onclick="edit(2)"> edit </a></li>
                                    <li width='50%'><a href="{!! route('deletePost', ['data'=>$post->id]) !!}"> delete </a></li>
							    </ul>
                                <form class="form-horizontal" method="get" action="{!! route('comment', ['data'=>$post->title]) !!}">
                                    <textarea class="form-control" name = "comment" rows="1" placeholder="Comment"></textarea>
                                    <li ><button type="submit"> comment </button></li>
                                    <br>
                                </form>
                            </div>
                            <form class="form-horizontal" method="get" action="{!! route('editPost', ['data'=>$post->id]) !!}" id="editform">
                                    <textarea class="form-control" name = "edittitle" rows="1" placeholder="new title"></textarea>
                                    <textarea class="form-control" name = "editbody" rows="3" placeholder="new body"></textarea>
                                    <li ><button type="submit"> edit </button></li>
                            </form>
                        </li>
                        <br id="br1"><br id="br1"><br id="br1"><br id="br1"><br id="br1"><br id="br1">
                    </ul>
                    @if ($data['coms'])
                        @foreach($data['coms'] as $comment)
                            @if ($comment->Ptitle == $post->title)
                                <h5 class="title">{{$comment->comment}}</h5>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>                         
        @endforeach
    @endif
    @endif
</body>    
@endsection