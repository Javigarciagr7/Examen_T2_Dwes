<?php
// https://github.com/Javigarciagr7/Examen_T2_Dwes.git

// solicitar los archivos "articulo.php", "bebida.php", "pizza.php";
include 'Articulo.php';
include 'bebida.php';
include 'Pizza.php';


// Inicialización de los artículos
$articulos = [
    new Articulo("Lasagna", 3.50, 7.00, 20),
    new Articulo("Pan de ajo y mozzarella", 2.00, 4.50, 15),
    new Pizza("Pizza Margarita", 4.00, 8.00, 30, ["Tomate", "Mozzarella", "Albahaca"]),
    new Pizza("Pizza Pepperoni", 5.00, 10.00, 25, ["Tomate", "Mozzarella", "Pepperoni"]),
    new Pizza("Pizza Vegetal", 4.50, 9.00, 18, ["Tomate", "Mozzarella", "Verduras Variadas"]),
    new Pizza("Pizza 4 quesos", 5.50, 11.00, 20, ["Mozzarella", "Gorgonzola", "Parmesano", "Fontina"]),
    new Bebida("Refresco", 1.00, 2.00, 50, false),
    new Bebida("Cerveza", 1.50, 3.00, 40, true)
];


// Ejemplo de uso
echo "<h1>Nuestro Menú</h1>";
mostrarMenu($articulos);
echo "<br>";

echo "<h2>Lo más vendido</h2>";
mostrarMasVendidos($articulos);
echo "<br>";

echo "<h2>¿Los más lucrativos!</h2>";
mostrarMasLucrativos($articulos);
echo "<br>";


//Funciones
function mostrarMenu($articulos) {

    $tipos = [
        'Pizza' => [],
        'Bebida' => [],
        'Otros' => []
    ];

    foreach ($articulos as $articulo) {
        if ($articulo instanceof Pizza) {
            $tipos['Pizza'][] = $articulo;
        } elseif ($articulo instanceof Bebida) {
            $tipos['Bebida'][] = $articulo;
        } else {
            $tipos['Otros'][] = $articulo;
        }
    }


    foreach ($tipos as $tipo => $items) {
        if (!empty($items)) {
            echo "<h2>$tipo</h2>";
            foreach ($items as $item) {
                $item->MostrarNombre();
                echo "<br>";
            }
        }
    }
}

function mostrarMasVendidos($articulos) {
    usort($articulos, function ($a, $b) {
        return $b->getContador() - $a->getContador();
    });

    $masVendidos = array_slice($articulos, 0, 3);

    foreach ($masVendidos as $articulo) {
        echo "{$articulo->MostrarNombre()} - Vendidos: {$articulo->getContador()}<br>";
    }
}

function mostrarMasLucrativos($articulos) {

    $beneficios = [];
    foreach ($articulos as $articulo) {
        $beneficio = ($articulo->getPrecio() - $articulo->getCosto()) * $articulo->getContador();
        $beneficios[] = ['articulo' => $articulo, 'beneficio' => $beneficio];
    }

    usort($beneficios, function($a, $b) {
       return $b['beneficio'] - $a['beneficio'];
    });
    

    foreach ($beneficios as $beneficio) {
        echo "{$beneficio['articulo']->MostrarNombre()} - Beneficio: {$beneficio['beneficio']}€<br>";
    }
}

