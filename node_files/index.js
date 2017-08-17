var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var mysql = require('mysql');

var MySQLEvents = require('mysql-events');
var dsn = {
  host: "localhost",
  user: "root",
  password: "password",
  database: "pgeon"

};

var con = mysql.createConnection(dsn);

con.connect();

app.get('/', function (req, res) {
  res.send('<h1>Hello world</h1>');
});

//rooms 
var rooms = [];




io.on('connection', function (socket) {


  socket.on('connect_me', function (room) {

    if (rooms.indexOf(room) == -1) {
      rooms.push(room);
      //   socket.emit('updatechat', 'SERVER', 'You are connected. Start chatting');
    } else {

    }

    socket.room = room;
    socket.join(room);

  });

  console.log('a room connected');


  socket.on('disconnect', function (room) {
    // console.log('a room disconnected'+ room);
    socket.leave(socket.room);
  });


});




http.listen(3001, function () {
  console.log('listening on *:3001');
});


var mysqlEventWatcher = MySQLEvents(dsn);
var watcher = mysqlEventWatcher.add(
  'pgeon.questions',
  function (oldRow, newRow, event) {
    //row inserted 
    if (oldRow === null) {
      //TODO will be converted to SP

      //just notify all the users connected via socket


      rooms.forEach(function (room) {
        //skipe Q detail sockets
        if (room.indexOf('Q_') == -1) {
          io.sockets.in(room).emit('new_question', newRow.fields.id);
        }

      });

      /*
          //notify every users who are following asker
            var sql = "SELECT uf.followed_by FROM questions q INNER JOIN user_followings uf  ON q.user_id = uf.user_id      WHERE q.id = "+newRow.fields.id;
          con.query(sql, function (err, result) {
            if (err) throw err;
                          
              result.forEach(function(rec) {
                    io.sockets. in (rec.followed_by).emit('new_question', newRow.fields);   
                });
          });
          */



    }




  }

);

var ans_watcher = mysqlEventWatcher.add(
  'pgeon.answers',
  function (oldRow, newRow, event) {
    //row inserted 
    if (oldRow === null) {
      // if (oldRow != newRow) {
      //TODO will be converted to SP
      //notify every users who are following asker
      var sql = "SELECT name, id FROM users WHERE id = " + newRow.fields.user_id;
      con.query(sql, function (err, result) {
        if (err) throw err;
        //  result.forEach(function(rec) {
        io.sockets.in('Q_' + newRow.fields.question_id).emit('new_answers', {
          'answer': newRow.fields.answer,
          'name': result[0].name,
          'user_id': result[0].id,
          'id': newRow.fields.id
        });
        // });
      });

    }

    //row deleted
    if (newRow === null) {
        
      //nofity all the question detail page who are all viewing this quesiont
      io.sockets.in('Q_' + oldRow.fields.question_id).emit('answer_deleted', oldRow.fields.id);

    }




  }

);




var votes_watcher = mysqlEventWatcher.add(
  'pgeon.votes',
  function (oldRow, newRow, event) {
    //row inserted 
    if (oldRow === null) {
      // if (oldRow != newRow) {
      //TODO will be converted to SP
      //notify the user who answered for the vote
      var sql = "SELECT user_id, answer_id FROM  WHERE id = " + newRow.fields.user_id;
      con.query(sql, function (err, result) {
        if (err) throw err;
        //  result.forEach(function(rec) {
        io.sockets.in('Q_' + newRow.fields.question_id).emit('new_answers', {
          'answer': newRow.fields.answer,
          'name': result[0].name,
          'user_id': result[0].id,
          'id': newRow.fields.id
        });
        // });
      });

    }

    //row deleted
    if (newRow === null) {
        
      //nofity all the question detail page who are all viewing this quesiont
     // io.sockets.in('Q_' + oldRow.fields.question_id).emit('answer_deleted', oldRow.fields.id);

    }




  }

);