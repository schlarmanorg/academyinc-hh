
<!DOCTYPE html>
<!--[if lte IE 6]><html class="preIE7 preIE8 preIE9"><![endif]-->
<!--[if IE 7]><html class="preIE8 preIE9"><![endif]-->
<!--[if IE 8]><html class="preIE9"><![endif]-->
<!--[if gte IE 9]><!--><html><!--<![endif]-->
  <head>
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>title</title>
  <meta name="author" content="name">
  <meta name="description" content="description here">
  <meta name="keywords" content="keywords,here">
  <link rel="stylesheet" href="master.css" type="text/css">
  </head>
  <body>
  <div align="center">
    <div class="list">

    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
  
    $(document).ready(function() {
        $.ajax({
            url: "https://sheets.googleapis.com/v4/spreadsheets/16EXdxJDXO10Yrc21EEsFTPZ7_8BgOUbLkNMnewvzk1U/values/Sheet1!A1:E5?key=AIzaSyDPezqjFvsVMRLlheTK1at9SP-5WAdBWxU",
            dataType: "json",
            success: function (data) {
                i = 1;
                while (i <= 4) {
                    console.log(data.values[i]);
                    var l = data.values[i];
                    console.log(""+ l[0] +" : "+ l[4] +" Points");
                    $(".list").append("<li data-position='"+ i +"' class='"+ i +"'><span class='name"+ i +"'>"+ l[0] +"</span> : <span class='value"+ i +"'>"+ l[4] +"</span> Points");
                    i++;
                }
            }
        });
        var interval = setInterval(function() {
            $.ajax({
            url: "https://sheets.googleapis.com/v4/spreadsheets/16EXdxJDXO10Yrc21EEsFTPZ7_8BgOUbLkNMnewvzk1U/values/Sheet1!A1:E5?key=AIzaSyDPezqjFvsVMRLlheTK1at9SP-5WAdBWxU",
            dataType: "json",
            success: function (data) {
                i = 1;
                while (i <= 4) {
                    console.log(data.values[i]);
                    var l = data.values[i];
                    var val = $('.value'+ i +'');
                    if(l[0] == val) {
                        console.log("Left");
                        i++;
                    } else {
                        console.log("Changed");
                        val.text(l[4]);
                        i++;
                    }
                }
            }
        });
        }, 5000);
    });
    </script>
  </body>
</html>
