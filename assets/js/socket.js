var users = [],
    socket = null;

function createWebSocket(username) {
  socket = io.connect(location.host + ':26002');
  
  socket.on('connect', function(){
    var link = location.pathname+location.search;
    var dados = {};dados['u'] = username;dados['app'] = link;
    socket.emit('join', $.toJSON(dados));
  });

  socket.on('up_user_list', function (data) {
    var data = $.parseJSON(data);
    $('#users_online').html('');
    for(var i in data){
      $('#users_online').append("<li class='user_"+i+"' rel='tooltip' data-original-title='"+data[i]['app']+"' cod='" + data[i]['id'] + "'><a href='javascript: void(0);'>" + data[i].u + "</a></li>");
    }
    $('li[rel=tooltip]').tooltip({placement: "left"});
  });

  socket.on('ad_user_list', function (id, user, app) {
    $('#users_online').append("<li class='user_"+id+"' data-original-title='" + app + "' cod='" + id + "' rel='tooltip'><a href='javascript: void(0);'>" + user + "</a></li>");
    $('.user_'+id).tooltip({placement: "left"});
  });

  socket.on('rm_user_list', function (id, user) {
    $('.user_'+id).remove();
  });

  socket.on('up_location', function (id, user, app) {
    $('.user_'+id+'[cod='+id+']').attr('data-original-title', " " + app + " ");
    $('.user_'+id+'[cod='+id+']').tooltip({placement: "left"});
  });

  socket.on('update_user_list', function (id, user, app) {
    $('.user_'+id).attr('data-original-title', " " + app + " ");
    $('.user_'+id).attr('cod', id);
    $('.user_'+id).tooltip({placement: "left"});
  });
}