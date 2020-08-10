   <?php
    class ResidentController
    {


        public function listResident()
        {
            $residentManager = new ResidentManager();
            $residents = $residentManager->selectAll();
            $countResidents = $residentManager->count();
            require 'View/list-resident.php';
        }
    }
