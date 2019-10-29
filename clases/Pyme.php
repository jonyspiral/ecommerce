<?php

class Pyme extends Cliente {

    public function liquidarHaberes(Persona $persona, int $monto)
    {
        $this->getCuenta()->setBalance($this->getCuenta()->getBalance() - $monto);
        $persona->getCuenta()->setBalance($persona->getCuenta()->getBalance() + $monto);

    }


}
 ?>
