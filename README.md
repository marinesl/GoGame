# Creation of the Go Game

## Project :
Go Game in PHP, just the code to play, no user interaction

### Authors :
*Marine LANCELIN & François-Xavier BRESSON*

### File Tree :
- src : class
- views : front views
- web : front elements (css/images)

### Specifications :
- PHP
- Composer
- Namespace / Autoload
- CSS

### Diagram class :
- Class Game :
* Properties : Player player1 ; Player player2 ; Goban goban ; int currentPlayer
* Function : void play(postion) ; void playStone(index) ; void swapPlayers() ; Player getPlayer1() ; Player getPlayer2() ; Goban getGoban() ; int getCurrentPlayer() ; bool isAlreadyInZone(postion, zones)
- Class Goban :
* Properties : int size ; array	board
* Function : array createGoban() ; void placeStone(player, index) ; Stone|null getStone(index) ; int|null getStoneOwner(index) ; void swapStone(index) ; int getSize() ; array getBoard()
- Class Player :
* Properties : string name ; int score ; string color
* Function : void setName(name) ; string getName() ; void setScore(score) ; void addToScore(score_to_add) ; int getScore() ; string getColor()
- Class Stone :
* Properties : int owner ; int position
* Function : void swapOwner() ; int getOwner()
- Class Zone :
* Properties : int owner ; Goban goban ; int[] stones ; bool valid
* Function : void get_zone(position) ; int getSize() ; boolean isValidZone() ; array getDirections(position) ; void swapOwner() ; bool searchZone(position)
