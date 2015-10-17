<?php
		if (PHP_SAPI === 'cli') {
			$username = $argv[1];
			$password = $argv[2];
			$server = $argv[3];
		}
		else {
			$username = $_GET['argument1'];
			$password = $_GET['argument2'];
			$server = $_GET['argument3'];
		}
		$logfile = "rcc-enablelog-$server.txt";
		$fh = fopen($logfile, 'a') or die("can't open file");
            $client = new SoapClient("./axl/schema/9.1/AXLAPI.wsdl",
                array('trace'=>true,
               'exceptions'=>true,
               'features'=>SOAP_SINGLE_ELEMENT_ARRAYS,
               'location'=>"https://$server:8443/axl",
               'login'=>$username,
               'password'=>$password,
            ));
           $response = $client->executeSQLQuery(array("sql"=>"select u.userid,epas.pkid,epas.enablemoc,epas.fkenduser
															 as users from enduser as u inner join epasenduser as epas
															 on u.pkid = epas.fkenduser where epas.enablemoc = 'f'"));
        if (empty($response->return->row)){
				die;
			}
		else{   
		foreach ($response->return->row as $row){
                $returnedpkid = $row->pkid;
				$returneduserid = $row->userid;
				$updateuser =  $client->executeSQLUpdate(array("sql"=>"update epasenduser set enablemoc = 't' where pkid = '$returnedpkid'"));
                $queryresult = ("USERID: ".$returneduserid ." Enabled for RCC". "\r\n");
				fwrite($fh, $queryresult);
				}
		}
		fclose($fh);
?>




select u.userid,epas.pkid,epas.enablemoc,epas.fkenduser,user.fkenduser,user.firstname,user.lastname 

as users from enduser as u 

inner join epasenduser as epas on u.pkid = epas.fkenduser 

inner join enduserex as user on u.pkid = user.fkenduser

where epas.enablemoc = 'f'
