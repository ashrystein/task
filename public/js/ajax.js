
        $(document).ready(function(){
            $(".delete").click(function(){    
            var del_id = $(this).attr('id');
            var remove = '.'+String(del_id);
            alert(del_id)
                $.ajax({
                    type:'get',
                    url:'/deletePost/'+del_id,
                    data: { id : del_id},
                    success:function(data) {
                                //alert(data.msg)
                                $(remove).remove();
                            },
                    error: function (xmlhttp, ajaxOptions, thrownError) {
                                alert(xmlhttp.status);
                                alert(thrownError);
                            }
                });    
            })
        });

        $(document).ready(function(){
            $(".formComment").click(function(){    
            var ptitle = $(this).attr('name');
            var pid = $(this).attr('id');
            var comment = $(this).children('textarea').val();
            var addc = '.'+String(pid);
                $.ajax({
                    type:'get',
                    url:'/createcomment',
                    data: {p : ptitle, c : comment},
                    success:function(p , c) {
                                //alert(addc)
                                $(".formComment").submit(function(e){
                                    e.preventDefault();
                                });
                                var txt = $("<h5></h5>").text(comment);
                                if(p && c){
                                    $(addc).append(txt);
                                }
                            },
                    error: function (xmlhttp, ajaxOptions, thrownError) {
                                alert(xmlhttp.status);
                                alert(thrownError);
                            }
                });    
            })
        });

        $(document).ready(function(){
            $(".formEditPost").click(function(){    
            var ptitle = $(this).find('textarea[name="edittitle"]').val();
            var pbody = $(this).find('textarea[name="editbody"]').val();
            var pid = $(this).attr('id');
            var update = '.'+String(pid);
                $.ajax({
                    type:'get',
                    url:'/editPost',
                    data: {p : ptitle, b : pbody , id:pid},
                    success:function(res) {                                
                                $(".formEditPost").submit(function(e){
                                    e.preventDefault();
                                });

                                $(update).find('h2[name="tit"]').text(ptitle);
                                $(update).find('p[name="desc"]').text(pbody); 
                            },
                    error: function (xmlhttp, ajaxOptions, thrownError) {
                                alert(xmlhttp.status);
                                alert(thrownError);
                            }
                });    
            })
        });
