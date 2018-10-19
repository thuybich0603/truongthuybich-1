$(document).ready(function(){
    $.get("data.json",function(){
        $.get("http://101.0.86.110:6699/api/v1/posts?page=2",function(response){
            var data = response.data.posts.data;
           // console.log(data.length);
        // var table = '<table id = "t_table"></table>';
        // $("#div_table").append(table);
        // var thead = '<thead id="t_thead" class="bg-success text-light"></thead>';
        // $(thead).appendTo("#t_table");
        // var tr = '<tr id = "tr_thead"></tr>';
        // $(tr).appendTo("#t_thead");
        // var th = '<th id ="th_thead">STT</th> <th>Name</th> <th>Email</th> <th> Password</th> <th>created_at</th> <th>Updated_at</th>';
        // $(th).appendTo("#tr_thead");
        // var tbody = '<tbody id = "t_tbody"></tbody>';
        // $("#t_thead").after(tbody);

        // var user = data.users;
        
        // user.forEach(function(user, index) {
        // var tr_tbody = '<tr id="trbody-'+index+'"></tr>';
        // $(tr_tbody).appendTo("#t_tbody");
        // var thBody = ' <th>' + user.id + '</th>';
        //   var tdBody = '<td>' + user.name + '</td><td>' + user.email + '</td><td>' + user.password + '</td><td>' + user.created_at + '</td><td>' + user.updated_at + '</td><td>';
        //$('#trbody-' + index).append(thBody, tdBody);
        // });
       
        var cardGroup = '<div class="card-group" id="cGroup"></div>';
        $('#div_card1').append(cardGroup);

        for(i = 0; i < data.length; i++){
            if(data.length > 3 )
            { data.length =3;} //Rut ngan so mang thanh do dai la 3 neu length hien tai lon hon 3
        var card = '<div class="card" id="card-'+data[i].id+'"></div>';
        $(card).appendTo("#cGroup");

        var cardBody = '<div class="card-body" id="cBody-'+data[i].id+'"></div>';
        $(cardBody).appendTo('#card-'+data[i].id);
        var h3 = '<h3 class="card-title" id="cTitle">' + data[i].title + '</h3>';
        $(h3).appendTo('#cBody-'+data[i].id);
        var p = '<p class="card-text" id="content">' +data[i].content+ '</p>';
        $(p).appendTo('#cBody-'+data[i].id
        );
   
    }
    // var cardGroup2 = '<div class = "card-group" id = "cGroup"> </div>';
    // $("#div_card2").append(cardGroup2);

    // for (i = 0; i < data.length; i++){
    //     if(data.length > 2){
    //         data.length = 2;
    //     }
    //     var card = '<div class="card" id = "card-'+data[i].id+'"> </div>';
    //     $(card).appendTo("#cGroup");
        
    //     var cardBody = '<div class = "card-body" id = "cBody-'+data[i].id+'"></div>';
    //     $(cardBody).appendTo("card-"+data[i].id);
    //     var h3 = '<h3 class="card-title" id = "cTitle">'+data[i].title+'</h3>';
    //     $(h3).appendTo("#cBody-"+data[i].id);
    //     var p = '<p class="card-text" id = "cText">'+data[i].content+'</p>';
    //     $(p).appendTo("#cBody-"+data[i].id);
    // }
    });
    });
});
