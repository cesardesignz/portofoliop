<?php
switch ($to[$i]) {
// ********************************************************************************
//                      Enter your email addresses below.
//  $sendTo is the actual address the email will be sent to.
//  $toName is a description of that address.
//  Entries must be in this format:
//  case #: $sendTo .= "\"NAME\" <EMAIL@ADDRESS.HERE>";         $toName .= "A DISCRIPTON OF THE ADDRESS";       break;
//  Or if you wish to recieve multiple copies per email:
//  case #: $sendTo .= "\"NAME\" <EMAIL@ADDRESS.HERE>,NAME2 <EMAIL2@ADDRESS.HERE>, NAME3 <EMAIL3@ADDRESS.HERE>";         $toName .= "A DISCRIPTON OF THE ADDRESS";       break;
    case 1: $sendTo .= "\"CesarSilva\" <cesarsilvascp9@hotmail.com>";       $toName .= "Adresse Email CesarDesignz";     break;
    default: echo "There was an error with your input";
session_unset();
session_destroy();
session_write_close();
exit(0);
// ********************************************************************************
} // end switch
?>