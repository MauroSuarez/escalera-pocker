# Verificación de escalera, el mismo fue hecho con php version 7

Escribir una funcion que determine si un conjunto de cartas de una lista representan una escalera de poker (5
cartas con valores consecutivos) o no.
Las cartas siempre tienen valores entre 2 y 14, donde 14 es el AS.
Tener en cuenta que el AS tambien cuenta como 1.
La cantidad de cartas puede variar, pero nunca es superior a 7

***TestCase***

```bash
$results1 = $this->isStraight([2, 3, 4 ,5, 6]);
$this->assertEquals($results1, true, "2, 3, 4 ,5, 6");
$results2 = $this->isStraight([14, 5, 4 ,2, 3]);
$this->assertEquals($results2, true, "14, 5, 4 ,2, 3");
$results3 = $this->isStraight([7, 7, 12 ,11, 3, 4, 14]);
$this->assertEquals($results3, false, "7, 7, 12 ,11, 3, 4, 14");
$results4 = $this->isStraight([7, 3, 2]);
$this->assertEquals($results4, false, "7, 3, 2");
```