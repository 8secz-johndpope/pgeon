var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var MySQLEvents = require('mysql-events');
var dsn = {
  host:     "localhost",
  user:     "root",
  password: "password",
};

app.get('/', function(req, res){
  res.send('<h1>Hello world</h1>');
});

io.on('connection', function(socket){
    
     socket.on('chat message', function(msg){
    console.log('message: ' + msg);
  });
    
  console.log('a user connected');
  socket.on('disconnect', function(){
    console.log('user disconnected');
  });
});



http.listen(3000, function(){
  console.log('listening on *:3001');
});


var mysqlEventWatcher = MySQLEvents(dsn);
var watcher =mysqlEventWatcher.add(
  'pgeon.questions',
  function (oldRow, newRow, event) {
     //row inserted 
    if (oldRow === null) {
      //insert code goes here 
         console.log('inserted');
        console.log(newRow.fields)
    }
 
     //row deleted 
    if (newRow === null) {
      //delete code goes here 
         console.log('inserted de');
    }
 
     //row updated 
    if (oldRow !== null && newRow !== null) {
      //update code goes here 
         console.log('updat');
        console.log(newRow.fields)
    }
 
    //detailed event information 
    //console.log(event) 
  }
  
);