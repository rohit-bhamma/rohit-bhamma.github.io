<?php
session_start();	
include "class1.php";
	
		class User1 extends Connect
		{
			public $error = "Insufficient Credits";	
			public $error1 = "Incorrect Reciever";
			public $sender=0;
			public $reciever=0;
			public function transfer($id,$id1,$amount){
				global $link;
				$this->connect_fn();
				$sql = "SELECT Name,Current_Credit FROM users where ID='$id'";
				$result = mysqli_query($this->link, $sql);
				$sql1="SELECT Name,Current_Credit FROM users where Email='$id1'";
				$result1=mysqli_query($this->link, $sql1);
				while ($row = $result1->fetch_assoc()) {
					$this->reciever++;
				}
				// checking validity of reciever
				if($this->reciever==0){
					$_SESSION["error"]=$this->error1;
					header("location:transfer1.php?id=$id");
				}
				else{
					// checking validity of amount
					while ($row = $result->fetch_assoc()) {
						$f1=$row['Name'];
						$f2=$row['Current_Credit'];
						if ($f2<$amount){
							$_SESSION["error"]=$this->error;
							header("location:transfer1.php?id=$id");
						}
						else{
							// update sender and reciever details
							$f2=$f2-$amount;
							$sql3="UPDATE users SET Current_Credit='$f2' where ID='$id'";
							$result3=mysqli_query($this->link, $sql3);
							$sql5="SELECT ID,Name,Current_Credit FROM users where Email='$id1'";
							$result5=mysqli_query($this->link, $sql5);
							while ($row = $result5->fetch_assoc()) {
								$f3=$row['ID'];
								$f4=$row['Current_Credit'];
								$f4=$f4+$amount;
								$sql4="UPDATE users SET Current_Credit='$f4' where Email='$id1'";
								$result4=mysqli_query($this->link, $sql4);
								date_default_timezone_set("Asia/Calcutta");
								$date= date("M,d,Y h:i:s A");
								// update trensaction table
								$sql2="INSERT INTO transaction_log ( Sender_Id, Sender_Name, Reciever_Id, Reciever_Name, Amount_Sent, Transaction_Time) VALUES( '$id', '$f1', '$f3', '$id1', '$amount', '$date')";
								$result2=mysqli_query($this->link,$sql2);
							}
						}
					}
				}
			}
		}	
unset($_SESSION["error"]);
unset($_SESSION["error1"]);
?>