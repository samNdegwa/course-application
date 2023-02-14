
<!DOCTYPE html>
<html>
<head>
    <title>testing</title>
</head>
<body>
<button onclick="myFunction()">Test</button><br>
<button onclick="getFunction()">Get</button>
</body>
</html>
<script>
    function myFunction(){
        var names = [];
        var len=0;
         //names[0] = prompt("New member name?");
          var storedNames = JSON.parse(localStorage.getItem("names"));
          if (storedNames === null) {
            names[0] = 'Kamau'
            localStorage.setItem("names", JSON.stringify(names));
          } else {
            if(storedNames.length == 2){
                alert('Enough')
            } else {
            storedNames = JSON.parse(localStorage.getItem("names"))[0];
            var coming = prompt("New member name?");

            if(storedNames === coming)
            {
                alert('Exist')
            } else {
            names[0] = storedNames;
            names[1] = coming;
            localStorage.setItem("names", JSON.stringify(names));
        }
        }
          }
         // if (localStorage.getItem("names") === true) {
         //   //len = storedNames.length;
         //         names[1] = 'Wanjiku'
         //         localStorage.setItem("names", JSON.stringify(names));
         //  } else {
         //    names[0] = 'Kamau'
         //    localStorage.setItem("names", JSON.stringify(names));
         //  }
      
    }

    function getFunction() {
        var storedNames = JSON.parse(localStorage.getItem("names"));
        alert(storedNames.length)
    }
</script>