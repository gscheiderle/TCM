<!-- Zunächst der Knopf zum Anzeigen der Info -->
<button type="button" onmouseover="buttonShow()">Mehr Info</button>
 
<!-- Und dann die Info-Box -->
<div id="infoBox" style="width: 400px; padding: 5px; background-color: white; border: 2px solid #CCCCCC">
  Hier kommt die Zusatz-Info
  <p style="text-align: center; margin-top: 20px">
   <onmouseout="buttonHide()>
  </p>
</div>
 
<!-- Der JavaScript-Code -->
<script type="text/javascript">
<!--
var info = document.getElementById("infoBox");
info.style.display = "none"; // Box ausblenden
info.style.position = "absolute";
info.style.zIndex = 999;
// Entweder fix auf der Seite platziert
// info.style.left = "50px";
// info.style.top = "100px";
// Oder ein definiertes Stückchen unter dem Knopf
info.style.marginTop = "10px";
 
function buttonShow() {
  // Infobox anzeigen
  info.style.display = "";
}
function buttonHide() {
  // Infobox wieder ausblenden
  info.style.display = "none";
}
//-->
</script>