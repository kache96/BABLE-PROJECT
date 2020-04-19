<?php

include_once 'db.php';
error_reporting(0);
@ini_set('display_errors', 0);
    class BranchName extends DB{
        private $branchN;

        public function getBranchN(){
            return $this->branchN;
        }
        
        public function setBranchN($branchN){
            $this->branchN = $branchN;
        }

        public function branchN(){
            $query1 = $this->connect()->prepare("UPDATE branchn SET
            getBranchN = :getBranchN 
            WHERE branchN_id = :branchN_id");
            
            $query1->execute([
                'branchN_id' => 1, 
                'getBranchN' => $this->branchN 
            ]);
                        
            if($this->branchN == "Arkadia"){
                header("location: branches/branchAr.php");
            }
            if($this->branchN == "Bello"){
                header("location: branches/branchBe.php");
            }
            if($this->branchN == "Calasanz"){
                header("location: branches/branchCa.php");
            }
            if($this->branchN == "Centro Medellín"){
                header("location: branches/branchCe.php");
            }
            if($this->branchN == "Olaya"){
                header("location: branches/branchOl.php");
            }
            if($this->branchN == "Poblado"){
                header("location: branches/branchPo.php");
            }
            if($this->branchN == "Itagüí"){
                header("location: branches/branchIt.php");
            }
            if($this->branchN == "Administrativa"){
                header("location: branches/branchAd.php");
            }
            if($this->branchN == "Centro Internacional"){
                header("location: branches/branchCI.php");
            }
            if($this->branchN == "Cedritos"){
                header("location: branches/branchCed.php");
            }
            if($this->branchN == "Centro Mayor"){
                header("location: branches/branchCM.php");
            }
            if($this->branchN == "Chapinero"){
                header("location: branches/branchCha.php");
            }
            if($this->branchN == "Chia"){
                header("location: branches/branchChi.php");
            }
            if($this->branchN == "Madelena"){
                header("location: branches/branchMa.php");
            }
            if($this->branchN == "Modelia"){
                header("location: branches/branchMo.php");
            }
            if($this->branchN == "Multiplaza"){
                header("location: branches/branchMu.php");
            }
            if($this->branchN == "Plaza de las Américas"){
                header("location: branches/branchPA.php");
            }
            if($this->branchN == "Plaza Central"){
                header("location: branches/branchPC.php");
            }
            if($this->branchN == "Restrepo"){
                header("location: branches/branchRe.php");
            }
            if($this->branchN == "Soacha"){
                header("location: branches/branchSo.php");
            }
            if($this->branchN == "Suba"){
                header("location: branches/branchSu.php");
            }
            if($this->branchN == "Unicentro de Occidente"){
                header("location: branches/branchUO.php");
            }
            
        }
    }
?>
