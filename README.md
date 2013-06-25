LastFM2StatusBoard
==================

Displays last played track on LastFM for use on the Panic Status board app

##WHY??
You might ask "Who the fork listens to LastFM these days?!". Probably nobody but if you scrobble your currently playing title to the service it suddenly gives you the possibility to to display your currently playing title on a StatusBoard. It is e.g. possible to scrobble from Spotify to LastFM, as well as from iTunes with 3rd party software. Almost any other decent audio player offers LastFM scrobbling, so you are not tied to Spotify or iTunes.

##Quickstart:
Point a custom 16x1 panel in StatusBoard to http://digitalupgrade.de/lastfm.php?lastfmusername=YOURUSERNAME (of course replacing YOURUSERNAME with your LastFM username). This will display correctly on portrait oriented StatusBoards.

##Script Notes:  
If you take a look at the source code, you'll see it is whipped together quickly. I neither bothered to use an XML parser to retrieve the title information, nor did I use AJAX to refresh the data. Instead I simply reload the page every 5 seconds.    
The Javascript adjusts the font size to fit the panel, like this long titles will be really small but medium titles should™ always display nicely.  
In case you feel that this thing should auto adjust to whatever the panel size is of use fancy stuff that makes the world better, feel free to improve this proof of concept and send me a pull request.