var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var mysql = require('mysql');

var MySQLEvents = require('mysql-events');
var dsn = {
  host:     "localhost",
  user:     "root",
  password: "password",
  database: "pgeon"

};

var con = mysql.createConnection(dsn);

con.connect();

app.get('/', function(req, res){
  res.send('<h1>Hello world</h1>');
});

//rooms 
var rooms = [];




io.on('connection', function(socket){
    
    
    socket.on('connect_me', function(room){
        
    if(rooms.indexOf(room) == -1)
        {  
            rooms.push(room);
         //   socket.emit('updatechat', 'SERVER', 'You are connected. Start chatting');
        }else {
                
        }
        
        socket.room = room;
            socket.join(room);
        
  });
    
  console.log('a room connected');
  socket.on('disconnect', function(){
    socket.leave(socket.room);
  });
    
    
});




http.listen(3001, function(){
  console.log('listening on *:3001');
});


var mysqlEventWatcher = MySQLEvents(dsn);
var watcher =mysqlEventWatcher.add(
  'pgeon.questions',
  function (oldRow, newRow, event) {
     //row inserted 
    if (oldRow === null) {
      //insert code goes here 
          //notify every users who are following asker
            var sql = "SELECT uf.followed_by FROM questions q INNER JOIN user_followings uf  ON q.user_id = uf.user_id      WHERE q.id = "+newRow.fields.id;
          con.query(sql, function (err, result) {
            if (err) throw err;
                          
              result.forEach(function(rec) {
                    //console.log(rec);
                    io.sockets. in (rec.followed_by).emit('new_question', newRow.fields);   
                });
          });
        
    }
 
     //row deleted 
    if (newRow === null) {
      //delete code goes here 
     //    console.log('inserted de');
    }
 
     //row updated 
    if (oldRow !== null && newRow !== null) {
      //update code goes here 
         console.log('updat');
       
        

           
          
       

    }
 
    
  }
  
);