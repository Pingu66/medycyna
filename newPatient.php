<?php
require_once("config.php");
if(isset($_REQUEST['firstName']) && isset($_REQUEST['lastName'])) {
    $p = new Patient();
    $p->setFirstName($_REQUEST['firstName']);
    $p->setLastName($_REQUEST['lastName']);
    $p->setPhone($_REQUEST['phone']);
    $p->setPesel($_REQUEST['pesel']);
    if($p->save()) {
        $smarty->assign("message", "Pacjent dodany do systemu");
        $smarty->assign("returnUrl", "patientLogin.php");
        $smarty->display("message.tpl");
    }
    else {
        $smarty->assign("message", "BŁĄD: Nie udało się dodać pacjenta");
        $smarty->assign("returnUrl", "newPatient.php");
        $smarty->display("message.tpl");
    }
  
} else {
    $smarty->display("newPatientForm.tpl");
}

?>