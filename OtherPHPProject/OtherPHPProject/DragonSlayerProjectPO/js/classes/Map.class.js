/***********************************************************************************/
/************************************ CLASSE MAP ***********************************/
/***********************************************************************************/

/*
 * La carte est un tableau à deux dimensions, la valeur stockée représente le
 * type de bloc à cet emplacement sur la carte.
 *
 * Les types de blocs sont définis dans le fichier dragon-slayer-data.js.
 *
 * On peut voir cette carte comme une une représentation "vue du dessus" du jeu.
 */

// Carte du jeu à stocker dans une propriété de la classe.
/*

 */

var Map = function () {
    this.map =
        [
            [ -1, -1, -1, -1, -1, -1, -1, -1, -1, -1 ],
            [ -1,  0, -1, -1,  0,  0,  0,  0,  2, -1 ],
            [ -1,  1, -1,  0,  0,  0, -1,  0, -1, -1 ],
            [ -1,  0,  0,  0,  0,  0,  0,  0,  0, -1 ],
            [ -1, -1, -1,  0,  0,  0,  0, -1,  0, -1 ],
            [ -1,  0,  0,  0,  0,  0,  0, -1,  0, -1 ],
            [ -1,  0,  0, -1, -1, -1,  0, -1,  0, -1 ],
            [ -2,  0,  0,  0, -1,  0,  0, -1,  0, -1 ],
            [ -2, -2,  0,  0,  0,  0,  0, -1, -2, -2 ],
            [ -2, -2, -1, -1, -1, -1, -1, -1, -1, -1 ]
        ];
};

Map.prototype.getBlockAt = function (x, y) {
    return this.map[y][x];
};

Map.prototype.getSize = function () {
  return this.map.length;
};

Map.prototype.isBlockEmpty = function (x, y) {

  return this.getBlockAt(x, y) >= 0;
};

Map.prototype.removeBlockAt = function(x, y)
{
    this.map[y][x] = MAP_EMPTY;// supprimer tout élément de la case x-y

};
