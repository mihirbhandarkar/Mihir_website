<!DOCTYPE html>
<html>
<head> 
  <title>PHP</title> 
</head> 
<body>

<h1>Button</h1>

<label for="Password">Password:</label>
<input type="text" id="Password" name="Password"><br><br>


<button type="button" onclick="myFunction()"> Click Me </button>
<button type="button" onclick="test()"> test </button>

<p id="result"></p>
<p id="reading"></p>

<?PHP
echo shell_exec("python3 test.py 'Parameter1'");
?>


<script>
  function test(){
    console.log("Hello world!");


  }
  function myFunction() { 
    const xhr = new XMLHttpRequest();
    const xhr1 = new XMLHttpRequest();

    var user_imp = document.getElementById("Password").value;
    if(user_imp == "1234"){
      document.getElementById("result").innerHTML = user_imp;
      xhr.open("GET", "https://api.thingspeak.com/update?api_key=931PF5QS12B5FZ6C&field1=1");
      // xhr.send();

      xhr1.open("GET", "https://api.thingspeak.com/channels/2637609/fields/1.json?api_key=V8JPCRY5BO6N9SN6&results=2");
      xhr1.onload = function(event)
      {
        const obj = JSON.parse(xhr1.responseText);
        document.getElementById("reading").innerHTML = (obj.feeds[obj.feeds.length - 1].field1);
      }
      xhr1.send();

      //var resp = xhr1.responseText;

      // var info = eval ( "(" + xhr1.responseText + ")" );


    }
    else{
      document.getElementById("result").innerHTML = "Wrong Password";
      xhr.open("GET", "https://api.thingspeak.com/update?api_key=931PF5QS12B5FZ6C&field1=0");
      xhr.send();
    }
  }
</script>


</body>
</html> 

