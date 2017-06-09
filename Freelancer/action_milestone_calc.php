<?php 
	include('Admin/MyInclude/MyConfig.php');
?>
<?php
extract($_POST);

if(isset($project_id) && $release=='true' && isset($id))
{
	
	$_SESSION['milestone_id']=$id;

	mysql_query("update milestone set status='release',release_date=CURDATE() where project_id='$project_id' and id='$id'");
	
	$mst=mysql_query("select * from milestone where project_id='".$project_id."' and status='release'");
	$mst_cnt=mysql_num_rows($mst);
	
	$sql_commision=mysql_fetch_array(mysql_query("select * from admin_commision_percentage"));
	if($mst_cnt == 1)
	{
		
		$cost=mysql_fetch_array(mysql_query("select * from milestone where project_id='".$project_id."' and id='$id'"));
		
		
		$commision_admin = $total_cost * ($sql_commision['client_percentage'] / 100); 
		$commision_dev = $total_cost * ($sql_commision['developer_percentage'] / 100);
		
		
		$_SESSION['admin_commision'] = ceil($commision_admin);
		$_SESSION['commision_dev'] = ceil($commision_dev);
		
		$remain_pay=$cost['create_payment'] - ceil($commision_dev);
		
		$total_commision = ceil($commision_admin) + ceil($commision_dev);
		
		
		
			if($cost['create_payment'] <= ceil($commision_dev))
			{
				echo 'admin_pay';
				$_SESSION['remain_pay']=$cost['create_payment'];
				$_SESSION['commision_admin']=$total_commision;
			}
			else
			{
				echo "first";
				$_SESSION['commision_admin']=$total_commision;
				$_SESSION['remain_pay']=$remain_pay;
			}
	}
	else
	{
		$remain=mysql_fetch_array(mysql_query("select * from milestone where project_id='".$project_id."' and id='$id'"));
		
		$admin_commision=mysql_fetch_array(mysql_query("select * from admin_commision where project_id='".$project_id."' order by id desc"));
		
		$client_commision = $admin_commision['from_client_commision'];
		$dev_commision = $admin_commision['from_dev_commision'];
		$total_commison = $admin_commision['total_commision'];
			
			
		$dev = $total_commison - $client_commision;
		$remain_commision = $dev - $dev_commision;
			
			
		$comission=$remain['create_payment'] - $remain_commision;

		if($dev_commision < $dev)
		{
			if($comission > 0)
			{
				echo 'first';
				$_SESSION['commision_admin']=$remain_commision;
				$_SESSION['remain_pay']=$comission;
				
				$_SESSION['update']='update';
			}
			else
			{
				echo 'admin_pay';
				$_SESSION['remain_pay']=$remain['create_payment'];				
				$_SESSION['admin_pay']='update';
			}
		}
		if($dev_commision == $dev)
		{
			echo "remain";
			$_SESSION['remain_pay']=$remain['create_payment'];
		}
	}
}
?>