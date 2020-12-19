<?php
	session_start();
	if (!isset($_SESSION['email'])) {
		header('location: ../index.php');
	}
?>
<?php include('header.php'); ?>
<body>
<?php include('navbaradmin.php'); ?>
<div class="container">
	<h1 class="page-header text-center">SALES</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>Id</th>
			<th>Date</th>
			<th>Customer</th>
			<th>Total Sales</th>
			<th>Details</th>
			<th>Status</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from sales order by date_purchase desc";
				$query=$conn->query($sql);
				while($row=$query->fetch_array()){
					?>
					<tr>
						<td><?php echo $row['purchaseid'] ?></td>
						<td><?php echo date('M d, Y h:i A', strtotime($row['date_purchase'])) ?></td>
						<td><?php echo $row['customer']; ?></td>
						<td class="text-right">&#8369; <?php echo number_format($row['total'], 2); ?></td>
						<td><a href="#details<?php echo $row['purchaseid']; ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> View </a>
							<?php include('sales_modal.php'); ?>
						</td>
						<td><?php 
								$id99 = $row['purchaseid'];
								$sql99 = "select * from purchase where purchaseid='$id99'";
								$result99 = $conn->query($sql99);
								$row99 = $result99->fetch_assoc();
								if($row99['status']==0){
									echo"Pending";
								  }else{
								  	echo"Delivered";
								  }
							?></td>
					</tr>
					<?php
				}
			?>
		</tbody>
	</table>
</div>
</body>
</html>