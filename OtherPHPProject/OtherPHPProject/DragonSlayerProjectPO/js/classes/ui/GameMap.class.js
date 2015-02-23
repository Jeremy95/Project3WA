/***********************************************************************************/
/************************** CLASSE AFFICHANT LE MONDE DU JEU ***********************/
/***********************************************************************************/

// Définition de la taille d'un bloc en pixels dans le canvas.
const BLOCK_PIXEL_SIZE = 40;

var GameMap = function(map)
{

    var canvas = $('#js-ui-game-map').find('canvas').get(0);

    canvas.height = map.getSize()*BLOCK_PIXEL_SIZE;
    canvas.width = map.getSize()*BLOCK_PIXEL_SIZE;
    this.context = canvas.getContext('2d');

    this.map = map;
};

GameMap.prototype.refresh = function (player)
{
    for(var y = 0; y < this.map.getSize(); y++)
    {
        for(var x = 0; x < this.map.getSize(); x++)
        {
            switch (this.map.getBlockAt(y, x))
            {
                case MAP_WATER :
                    this.context.fillStyle = "blue";
                    break;
                case MAP_DRAGON :
                    this.context.fillStyle = "red";
                    break;
                case MAP_EMPTY :
                    this.context.fillStyle = "green";
                    break;
                case MAP_TREASURE :
                    this.context.fillStyle = "yellow";
                    this.context.drawImage(player.imageT, player.x*BLOCK_PIXEL_SIZE, player.y*BLOCK_PIXEL_SIZE);
                    break;
                case MAP_WALL :
                    this.context.fillStyle = "firebrick";
                    break;

            }
            this.context.fillRect(y*BLOCK_PIXEL_SIZE, x*BLOCK_PIXEL_SIZE, BLOCK_PIXEL_SIZE, BLOCK_PIXEL_SIZE);
        }
    }

    this.context.fillStyle = "#D99E89";
    this.context.drawImage(player.image, player.x*BLOCK_PIXEL_SIZE, player.y*BLOCK_PIXEL_SIZE);
};

