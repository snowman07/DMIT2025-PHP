<?php
  function addEmoticons($txt) {

    // ->
    $thisEmoticon = "<img src=\"emoticons/icon_arrow.gif\">";
    $txt = str_replace("->", $thisEmoticon, $txt);

    // :D
    $thisEmoticon = "<img src=\"emoticons/icon_biggrin.gif\">";
    $txt = str_replace(":D", $thisEmoticon, $txt);

    // :/
    $thisEmoticon = "<img src=\"emoticons/icon_confused.gif\">";
    $txt = str_replace(":/", $thisEmoticon, $txt);

    // 8)
    $thisEmoticon = "<img src=\"emoticons/icon_cool.gif\">";
    $txt = str_replace("8)", $thisEmoticon, $txt);

    // =(
    $thisEmoticon = "<img src=\"emoticons/icon_cry.gif\">";
    $txt = str_replace("=(", $thisEmoticon, $txt);

    // :(
    $thisEmoticon = "<img src=\"emoticons/icon_sad.gif\">";
    $txt = str_replace(":(", $thisEmoticon, $txt);

    // :)
    $thisEmoticon = "<img src=\"emoticons/icon_smile.gif\">";
    $txt = str_replace(":)", $thisEmoticon, $txt);

    // ;-)
    $thisEmoticon = "<img src=\"emoticons/icon_wink.gif\">";
    $txt = str_replace(";-)", $thisEmoticon, $txt);

    return $txt;
  }

?>
