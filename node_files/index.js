/*
FLOW
=============
var socket object is created on app.blade
rooms are created on server when we call socket.emit('connect_me', 'U_{{Auth::user()->id}}'),  socket.emit('connect_me', 'Q_' + this.question_id);
.emit is for firing events. When fired from clients will be catched on servers and vice-versa
From clients the possible events are
  connect_me -- when rooms are created and joined
  disconnect -- sockets will leave the room array
  end_now -- will emit a question_ended to client
  cancel_now - will emit a question_cancelled to client
 */ 
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);
var mysql = require('mysql');
var MySQLEvents = require('mysql-events');
var dsn = {
  host: "localhost",
  user: "root",
  password: "05093d8a1cf495ac0acd5640a@",
  database: "pgeon"

};

var con = mysql.createConnection(dsn);

con.connect();

app.get('/', function (req, res) {
  res.send('<h1>Hello world</h1>');
});

//rooms
var rooms = [];

//settimeout will be set and will be stored this array...this should be cleared when the question is ended prematurely
var timeouts = {};

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

  
  socket.on('end_now', function (question_id) {
	  rooms.forEach(function (room) {
		  
		  
	        //get Q details page..notify the question ended
	        if (room.indexOf('Q_') != -1) {
	          io.sockets.in(room).emit('question_ended', question_id);
	        }

	      });
	  		sendNotifToVoters(question_id)
	  });

  
  socket.on('cancel_now', function (question_id) {
	  rooms.forEach(function (room) {
		  
		  console.log('questoin cane')
	        //get Q details page..notify the question ended
	        if (room.indexOf('Q_') != -1) {
	          io.sockets.in(room).emit('question_cancelled', question_id);
	        }

	      });

    });
    

    socket.on('clearbubble', function (target_user) {
      //console.log('wat bugbgfbng');
      console.log('emitted'+target_user);
      io.sockets.in('U_' + target_user).emit('bubblecleared');
    });
    
});




http.listen(3001, function () {
  console.log('listening on *:3001');
});

var target_user = 0; 

var mysqlEventWatcher = MySQLEvents(dsn);



/*


/*
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
*/

function sendNotifToVoters(question_id) {
	clearTimeout(timeouts[question_id])
	delete timeouts[question_id]
	
	
	 
	$SQL = `SELECT  a.user_id as a_by, q.user_id as q_by, SUM(vote) as votecount FROM votes v INNER JOIN answers a ON a.id = v.answer_id 
		INNER JOIN  questions q on q.id = a.question_id WHERE a.question_id = ${question_id}  GROUP BY v.answer_id HAVING votecount != 0`;

		con.query($SQL, function (err, results) {
			for (var i = 0; i < results.length; i++) {
				
				var meta = `{"question_id":${question_id}, "votes": ${results[i]['votecount']}}`;
				var sql = `INSERT INTO notifications (target_user, type, created_at, meta) VALUES (${results[i]['a_by']},"votes_earned",  ${new Date().getTime() / 1000}, '${meta}')`

			     
		      con.query(sql, function (err) {
		    	  if (err) throw err;
		      })
			}
				  
		})
}

var watcher = mysqlEventWatcher.add(
  'pgeon.questions',
  function (oldRow, newRow, event) {
    //row inserted
    if (oldRow === null) {
   
     var question_id = newRow.fields.id
    	 
  
    	

      //send out notificatoins when the time expires
      var trigger_at = (newRow.fields.expiring_at * 1000) - new Date().getTime()

       
     
     timeouts[question_id] =  setTimeout(function () {
    	 	sendNotifToVoters(question_id)
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

    	/*
    	//delete all notifs for 'a question posted by a used being followed'

      var sql = "DELETE n.* FROM notifications n INNER JOIN notification_question_posted nqp " +
      			"ON n.id = nqp.notification_id WHERE question_id = "  + oldRow.fields.id;

      con.query(sql, function (err, results) {
        if (err) throw err;
        		

      })

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


//this insert will happen from application side and from node as well when an quesiton expires..

var notification_watcher = mysqlEventWatcher.add(
		  'pgeon.notifications',
		  function (oldRow, newRow, event) {
		    //row inserted
		    if (oldRow === null) {
		    	
		    	
		    	var target_user = newRow.fields.target_user
		    	//delete notifs 24 hrs old
		    	 var sql = "DELETE FROM `notifications` WHERE created_at  <= UNIX_TIMESTAMP(CURDATE()) AND target_user = " + target_user + " AND seen=1 ";
		    	 
		    	con.query(sql, function (err, result) {
			        if (err) throw err;
			        
			        var sql = "SELECT COUNT(1) AS cnt FROM notifications WHERE  seen=0 AND target_user =  " + target_user + " GROUP BY target_user";
			       // console.log(sql)
			        con.query(sql, function (err, cntresult) {
			          if (err) throw err;
			        //  console.log('emiting' + 'U_' + target_user)
			          io.sockets.in('U_' + target_user).emit('bubble', cntresult[0]['cnt']);
			         
			        })
			        
		    	})
		    	

	

		    }



		  }

		);


/*

can't emit to Q_ as we don't have question_field in votes tables..can't sent it to U_ either..as signed out users will not have uid

var votes_watcher = mysqlEventWatcher.add(
  'pgeon.votes',
  function (oldRow, newRow, event) {
    //row inserted
    if (oldRow === null) {
      // if (oldRow != newRow) {
      //TODO will be converted to SP
      //notify the user who are viewing the Q
      var sql = "SELECT SUM(vote) AS vote_count FROM votes  WHERE answer_id = " + newRow.fields.answer_id;
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