<?php

$animals = array (
  "Africa" => array ("Hepaprotodon liberiensis", "Hystrix cristata","Pantera"),
  "Australia" => array ("Bettongia", "Phascolarctos cinereus", "Sarcophilus harrisii"),
  "South America" => array ("Chaetophractus vellerosus", "Bradypus pygmaeus", "Lama"),
  "Noth America" => array ("Ursus horribillis", "Canis latrans", "Puma"),
  "Eurasia" => array ("Meles meles", "Prionailurus bengalensis", "Mustela"),
);

echo "<h1>Исходный массив</h1>";
echo "<pre>";
print_r($animals);
echo "</pre>";

$result = array();

foreach ($animals as $continent => $value) {
  for ($i = 0; $i < count($value); $i++) {
    if (strpos($value[$i], ' ')) {
      array_push($result, $value[$i]);
    }
  }
}

echo "<h1>Массив животных, у которых двойное название</h1>";
echo "<pre>";
print_r($result);
echo "</pre>";


$first_word = array();
$second_word = array();
foreach( $result as $value){
 $temp =  explode(" ", $value);
 array_push($first_word, $temp[0]);
 array_push($second_word, $temp[1]);

}

shuffle($first_word);
shuffle($second_word);

$joined_array = array();
for ($i = 0; $i < count($first_word); $i++) {
     array_push($joined_array, $first_word[$i]." ".$second_word[$i]);
}

echo "<h1>Фантазийные животные</h1>";
echo "<pre>";
print_r($joined_array);
echo "</pre>";

$new_continents = array();

foreach($first_word as $w1) {
    $founded = false;
    foreach($animals as $continent => $continentAnimals) {
        foreach($continentAnimals as $animal) {
            $tmp = explode(' ', $animal);
            if ($tmp[0] == $w1) {
                $founded = true;
                if (array_key_exists($continent, $new_continents)) {
                    array_push($new_continents[$continent], $animal);
                } else {
                    $new_continents[$continent] = array($animal);
                }
                break;
            }
        }
        if ($founded) {
            break;
        }
    }
}

echo "<h1>Континенты с фантазийными животными</h1>";
foreach($new_continents as $continent => $animals) {
  echo "<h2>".$continent."</h2>";
  $arr_length = count($animals);
  for ($i = 0; $i < $arr_length; $i++) {
    echo $animals[$i];
    if ($i + 1 != $arr_length) {
      echo ", ";
    }
  }
  echo "<br />";
}
?>
