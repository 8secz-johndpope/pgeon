var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var mysql = require('mysql');
var moment = require('moment');
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

var target_user = 0; 

var mysqlEventWatcher = MySQLEvents(dsn);


function deleteAndInsertResult(results, question_id)
{
    target_user = results[0].followed_by

    //delete seen notif which are created a day ago
 
  




      var notification = "{question_id:" + question_id + ",type:\'question_posted\'}"	
      var sql = "INSERT INTO notifications (target_user, created_at) VALUES (" + target_user + ",\"" + notification + "\",\"" + new Date().getTime() / 1000 + "\")"
      console.log(sql)
      con.query(sql, function (err) {
        if (err) throw err;
       
        //get the unseen notif count to send out bubble
      var sql = "SELECT COUNT(1) AS cnt FROM notifications WHERE target_user =  " + target_user + " GROUP BY target_user";
      console.log(sql)
      con.query(sql, function (err, cntresult) {
        if (err) throw err;
        console.log('emiting' + 'U_' + target_user)
        io.sockets.in('U_' + target_user).emit('bubble', cntresult[0]['cnt']);
        results.shift(); 
        if(results.length){
            return deleteAndInsertResult(results);
          }
      })
        
       

      })
  
}


var watcher = mysqlEventWatcher.add(
  'pgeon.questions',
  function (oldRow, newRow, event) {
    //row inserted
    if (oldRow === null) {
   
    	return false;

      //send out notificatoins when the time expires
      var trigger_at = (newRow.fields.expiring_at * 1000) - new Date().getTime()
      var question_id = newRow.fields.id

       
     
      setTimeout(function () {

        //check the question is not deleted in meantime
        var sql = "SELECT id FROM questions WHERE id = " + question_id;
         console.log(sql)
        con.query(sql, function (err, result) {
          if (err) throw err;


          if (result[0] !== undefined) {
            //send notif to followers
            var sql = "SELECT  uf.followed_by FROM  user_followings uf INNER JOIN questions q                            ON q.user_id = uf.user_id    INNER JOIN users u ON u.id = uf.user_id           WHERE q.id = " + question_id;
            console.log(sql)


             
            con.query(sql, function (err, results) {
              if (err) throw err;
              
              deleteAndInsertResult(results, question_id);
              

              
            
            })


          } else {
            //question deleted..do nothing
            console.log('deleted')
          }

        })


      }, trigger_at);

      rooms.forEach(function (room) {
        //skipe Q detail sockets
        if (room.indexOf('Q_') == -1) {
          io.sockets.in(room).emit('new_question', question_id);
        }

      });


    }



    //row deleted
    if (newRow === null) {

    	//delete all notifs for 'a question posted by a used being followed'

      var sql = "DELETE n.* FROM notifications n INNER JOIN notification_question_posted nqp " +
      			"ON n.id = nqp.notification_id WHERE question_id = "  + oldRow.fields.id;

      con.query(sql, function (err, results) {
        if (err) throw err;
        		

      })




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


//this insert will happen from application side and from node as well when an quesiton expires..

var notification_watcher = mysqlEventWatcher.add(
		  'pgeon.notifications',
		  function (oldRow, newRow, event) {
		    //row inserted
		    if (oldRow === null) {
		    	
		    	
		    	var target_user = newRow.fields.target_user
		    	//delete notifs 24 hrs old
		    	 var sql = "DELETE FROM `notifications` WHERE created_at  <= UNIX_TIMESTAMP(CURDATE()) AND target_user = " + target_user + " AND seen=1";
		    	 
		    	con.query(sql, function (err, result) {
			        if (err) throw err;
			        
			        var sql = "SELECT COUNT(1) AS cnt FROM notifications WHERE  seen=0 AND target_user =  " + target_user + " GROUP BY target_user";
			        console.log(sql)
			        con.query(sql, function (err, cntresult) {
			          if (err) throw err;
			          console.log('emiting' + 'U_' + target_user)
			          io.sockets.in('U_' + target_user).emit('bubble', cntresult[0]['cnt']);
			         
			        })
			        
		    	})
		    	

	

		    }



		  }

		);



/*
var votes_watcher = mysqlEventWatcher.add(
  'pgeon.votes',
  function (oldRow, newRow, event) {
    //row inserted
    if (oldRow === null) {
      // if (oldRow != newRow) {
      //TODO will be converted to SP
      //notify the user who answered for the vote
      var sql = "SELECT answer_id FROM votes WHERE id = " + newRow.fields.user_id;
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






 //send notif to users whoever answered
              var sql = "SELECT user_id FROM answers WHERE question_id = " + question_id;
             
*/
