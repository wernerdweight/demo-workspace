<?php

declare(strict_types=1);

class Animal {

  private int $age;

  public string $name;

  private static int $count = 0;

  public function __construct(int $age, string $name) {
    $this->name = $name;
    $this->setAge($age);  // you could also use $this->age = $age;
    self::$count++;
    echo "An animal named $this->name has been created.\n";
  }

  public function makeSound(): void {
    echo "$this->name makes a sound.\n";
  }

  public function getAge(): int {
    return $this->age;
  }

  public function setAge($age): void {
    if($age < 0) {
      throw new Exception("Age must be positive.");
    }
    $this->age = $age;
  }

  public static function getCount(): int {
        return self::$count;
    }

  public function __destruct() {
    self::$count--;
    echo "An animal named $this->name is being destroyed.\n";
  }
}

class Dog extends Animal {
  public string $breed;

  public function __construct(int $age, string $name, string $breed) {
    parent::__construct($age, $name);
    $this->breed = $breed;
    echo "The dog is a " . $this->breed . ".\n";
  }

  public function makeSound(): void {
    echo "$this->name barks.\n";
  }

  public function __destruct() {
    echo "A dog named $this->name is being destroyed.\n";
    parent::__destruct();
  }
}

// Create an instance of the Animal class
$animal = new Animal(5, "Generic Animal");
$animal->makeSound();


/*
echo $animal->name . " is " . $animal->getAge() . " years old.\n";

// Output the count of animals
echo "Total animals created: " . Animal::getCount() . "\n";

// Create an instance of the Dog class
$dog = new Dog(3, "Buddy", "Golden Retriever");
$dog->makeSound();
echo $dog->name . " is " . $dog->getAge() . " years old and is a " . $dog->breed . ".\n";

// Output the count of animals
echo "Total animals created: " . Animal::getCount() . "\n";

// Destroy the objects to see the destructors in action
unset($animal);
unset($dog);

// Output the count of animals after destruction
echo "Total animals remaining: " . Animal::getCount() . "\n";
*/
?>
