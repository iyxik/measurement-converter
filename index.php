<?php
session_start();

class PetShop
{
    public $petStorage = [];

    public function __construct()
    {
        if (isset($_SESSION['petshop'])) {
            $this->petStorage = $_SESSION['petshop'];
        }
    }

    public function addPet($type, $species, $name, $age)
    {
        $this->petStorage[] = [
            'type' => $type,
            'species' => $species,
            'name' => $name,
            'age' => (int)$age
        ];
        $_SESSION['petshop'] = $this->petStorage;
    }

    public function info($petInfo)
    {
        return "Hello! My name is {$petInfo['name']} and I am a {$petInfo['type']}. I am a '{$petInfo['species']}' breed and I am {$petInfo['age']} years old.";
    }

    public function uniqueAction($petInfo)
    {
        if ($petInfo['type'] === 'dog') {
            return "I am loyal to my owner";
        } elseif ($petInfo['type'] === 'cat') {
            return "My night vision is insane!";
        } elseif ($petInfo['type'] === 'rabbit') {
            return "My teeth grow constantly throughout my life";
        } elseif ($petInfo['type'] === 'turtle') {
            return "I am incredibly strong and persistent — especially when digging or swimming.";
        } elseif ($petInfo['type'] === 'horse') {
            return "I can remember people, places, and experiences — both good and bad — sometimes for life.";
        }
    }

    public function display()
    {
        foreach ($this->petStorage as $petInfo) {
            echo "<br>" . $this->info($petInfo) . "<br>";
            echo $this->uniqueAction($petInfo) . "<br>";
        }
    }
}

$request = new PetShop();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $species = $_POST['species'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $request->addPet($type, $species, $name, $age);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Pet shop manager</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text:ital@0;1&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Pet shop manager</h1>
        <form method="POST">
            <select name="type" required>
                <option value="">Choose pet</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="rabbit">Rabbit</option>
                <option value="turtle">Turtle</option>
                <option value="horse">Horse</option>
            </select><br><br>

            <input type="text" name="species" placeholder="Species" required><br><br>
            <input type="text" name="name" placeholder="Name" required><br><br>
            <input type="number" name="age" placeholder="Age" required><br><br>

            <button type="submit">Add</button>
        </form>
        <h3>Description</h3>
    </div>
    <?php $request->display();
    ?>

</body>

</html>