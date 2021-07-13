<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h3>Nouveau clients</h3>
<form action="store.php" method="post">
    Nom : <input type="text" name="nom"> 
    Prenom : <input type="text" name="prenom"> 
    Email : <input type="email" name="email" onblur="unique(this.value)"> 
    <button>Valider</button>
</form>
    


    <script>
        function unique(v){
           
        }
    
    </script>
</body>
</html>