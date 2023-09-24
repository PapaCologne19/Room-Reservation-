<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <ul>
    <li>Hello</li>
    <li>James</li>
  </ul>

  <script>
    console.log(Notification.permission);

function showNotification(){
  const notification = new Notification("New message from James Philip!",{
    body: "Hello, Sir. Kumusta ka?",
    icon: "../room/images/pcn.png"
  });

  notification.onclick = (e) => {
    window.location.href = "https://youtube.com/";
  }
}

    if(Notification.permission === "granted"){
     showNotification();
    } else if(Notification.permission !== "denied"){
      Notification.requestPermission().then(permission =>{
        console.log(permission);
      });
    }
  </script>
</body>
</html>