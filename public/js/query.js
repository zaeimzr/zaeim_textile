$(document).ready(function (e){
    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

     $(".add").click(function (){

      let id= $(this).parent().attr("id");
        if ($("#count"+id).text()>0){
            let i =$("#count"+id).text();
            i++;
            $("#count"+id).text(i);
            sessionStorage.removeItem(id);
            sessionStorage.setItem(id,i);
        }else {
            let name=$(this).siblings("h5").text();
            let code=$(this).siblings(".code").text();
            $(".list-group").append(" <li id=\"item"+id+"\" class=\"list-group-item\">\n" +
                "                            <div class=\"row justify-content-between\">\n" +
                "                                <button id=\"plus"+id+"\" type=\"button\" class=\"btn btn-primary btn-sm col-md-2 increase\" style=\"height: 2rem;\">+</button>\n" +
                "                                <div class=\"text-center alert alert-light col-md-5 pt-0\" style=\"height: 2rem\" role=\"alert\">"+name+" "+code+"</div>\n" +
                "                                <div id=\"count" +id+ "\"class=\"text-center count  alert alert-success col-md-3 pt-0\" style=\"height: 2rem\" role=\"alert\">1</div>\n" +
                "                                <button id=\"less"+id+"\"type=\"button\" class=\" btn btn-secondary btn-sm col-md-2 decrease\" style=\"height: 2rem;\">-</button>\n" +
                "                            </div>\n" +
                "                        </li>");
            sessionStorage.removeItem(id);
            sessionStorage.setItem(id,1);

        }

       //  var lis=$(this).siblings(".list-group").children(".list-group-item");
         var lis=$(this).parents(".container").find(".list-group-item");

         var ids=[];
         lis.each(function (){
             var val=[];
             var l =$(this).attr("id").toString().length;
             val[0]=$(this).attr("id").toString().substring(l-1,l);
             val[1]=$(this).find(".count").text();
             ids.push(val);
         });
         // console.log(ids);
         $.ajax({
             url: "/ajax",
             type: "POST",
             cache: true,
             data: {ids},
             dataType: 'html',
             beforeSend: function () {
             },
             success: function (response) {

                 // data meghdarie json shodeie k az samte server return mishe mitoni ba json.pars ono b array tabdil koni o meghdaresho estefade koni
                 // var resp = JSON.parse(response);
                 //
                 // if (resp.success == "1"){
                 //     alert("عضویت با موفقیت انجام شد")
                 // } else {
                 //     alert(resp.message);
                 // }


             },
             error: function (data) {
             },
         });

    });

    // $(".less").click(function (){
    //     let id= $(this).parent().attr("id");
    //     if ($("#count"+id).text()>1){
    //         let i =$("#count"+id).text();
    //         i--;
    //         $("#count"+id).text(i);
    //     }else{
    //         $(document).on("#item"+id,function (){
    //             $(this).remove();
    //         });
    //     }
    //
    // });
    $(document).on("click",".less",function (){
        let id= $(this).parent().attr("id");
        if ($("#count"+id).text()>1){
            let i =$("#count"+id).text();
            i--;
            $("#count"+id).text(i);
        }else{
            // // $("#item1").remove();
            // //     $(document).on("","#item0",function (){
            // //         console.log("sas")
            // })
        }
    });



    // increase &decrease

    $(document).on("click",".increase",function (){
        let i= $(this).siblings(".count").text();
        i++;
        $(this).siblings(".count").text(i);
        let l= ($(this).attr("id")).toString().length;
        let id= ($(this).attr("id")).toString().substring(l-1,l);
    });
    $(document).on("click",".decrease",function (){
        let i= $(this).siblings(".count").text();
        let l= ($(this).attr("id")).toString().length;
        let id= ($(this).attr("id")).toString().substring(l-1,l);
        if (i>1){
            i--;
            $(this).siblings(".count").text(i);

        }else {
            $(this).parent().parent().remove();
        }

    });

     // delete all of the list
    $("#deleteList").click(function (){
        $(".list-group").empty();
        var ids=[];
        $.ajax({
            url: "/ajax",
            type: "POST",
            cache: true,
            data: {ids},
            dataType: 'html',
            beforeSend: function () {
            },
            success: function (response) {

                // data meghdarie json shodeie k az samte server return mishe mitoni ba json.pars ono b array tabdil koni o meghdaresho estefade koni
                // var resp = JSON.parse(response);
                //
                // if (resp.success == "1"){
                //     alert("عضویت با موفقیت انجام شد")
                // } else {
                //     alert(resp.message);
                // }


            },
            error: function (data) {
            },
        });
    })

    $("#finish").click(function (){
      // var lis=$(this).siblings(".list-group").children(".list-group-item");
      // var ids=[];
      // lis.each(function (){
      //     var val=[];
      //     var l =$(this).attr("id").toString().length;
      //     val[0]=$(this).attr("id").toString().substring(l-1,l);
      //     val[1]=$(this).find(".count").text();
      //     ids.push(val);
      // });
      //  // console.log(ids);
      //   $.ajax({
      //       url: "/ajax",
      //       type: "POST",
      //       cache: true,
      //       data: {ids},
      //       dataType: 'html',
      //       beforeSend: function () {
      //       },
      //       success: function (response) {
      //
      //           // data meghdarie json shodeie k az samte server return mishe mitoni ba json.pars ono b array tabdil koni o meghdaresho estefade koni
      //           // var resp = JSON.parse(response);
      //           //
      //           // if (resp.success == "1"){
      //           //     alert("عضویت با موفقیت انجام شد")
      //           // } else {
      //           //     alert(resp.message);
      //           // }
      //
      //
      //       },
      //       error: function (data) {
      //   },
      //   });
    });

});
