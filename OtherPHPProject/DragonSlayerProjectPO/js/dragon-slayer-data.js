/***********************************************************************************/
/*********************************** CONSTANTES ************************************/
/***********************************************************************************/

/*
 * Les valeurs de ces constantes dépendent des valeurs des options du select du
 * formulaire de menu de démarrage :
 *
 * <option value="wizard">Magicien</option>
 * etc.
 */
const CLASS_PALADIN = 'paladin';
const CLASS_THIEF   = 'thief';
const CLASS_WIZARD  = 'wizard';


/*
 * Les valeurs de ces constantes dépendent des valeurs des boutons radio du
 * formulaire de menu de démarrage :
 *
 * <input type="radio" name="difficulty" value="easy">
 * etc.
 */
const LEVEL_EASY   = 'easy';
const LEVEL_NORMAL = 'normal';
const LEVEL_HARD   = 'hard';


/*
 * Définition du type de bloc sur la carte.
 *
 * Les valeurs < 0 sont infranchissables
 */
const MAP_WATER    = -2;
const MAP_WALL     = -1;
const MAP_EMPTY    =  0;
const MAP_DRAGON   =  1;
const MAP_TREASURE =  2;
const MAP_HEAL     =  3;


/*
 * Définition des différents état du jeu :
 *
 * STATE_LAUNCH     => le jeu démarre, le menu de démarrage est affiché
 * STATE_PLAY       => le joueur peut se déplacer sur la carte
 * STATE_FIGHT      => le joueur doit se battre à mort avec le dragon
 * STATE_END        => le jeu se termine, le vainqueur du combat s'affiche
 *
 * La méthode setState() de la classe Game permet de passer d'un état à un autre,
 * l'ordre chronologique est LAUNCH => PLAY => FIGHT => END
 */
const STATE_LAUNCH = 1;
const STATE_END    = 2;
const STATE_FIGHT  = 3;
const STATE_PLAY   = 4;


const KEY_DOWN_ARROW = 40;
const KEY_UP_ARROW = 38;
const KEY_LEFT_ARROW = 37;
const KEY_RIGHT_ARROW = 39;

const KEY_F =70;
const  KEY_Q = 81;
const  KEY_D = 68;
