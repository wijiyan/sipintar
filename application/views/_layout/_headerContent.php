<div class="content-header row">
	<div class="content-header-left col-md-9 col-12 mb-2">
		<div class="row breadcrumbs-top">
			<div class="col-12">
				<h2 class="content-header-title float-left mb-0"><?php echo $judul;?></h2>
				<div class="breadcrumb-wrapper col-12">
					<ol class="breadcrumb">
						<?php
						for ($i=0; $i<count($this->session->flashdata('segment')); $i++) { 
							if ($i == 0) {
								?>
								<li><li class="breadcrumb-item"></i> <?php echo $this->session->flashdata('segment')[$i]; ?></li>
								<?php
							} elseif ($i == (count($this->session->flashdata('segment'))-1)) {
								?>
								<li class="breadcrumb-item active"> <?php echo $this->session->flashdata('segment')[$i]; ?></li>
								<?php
							} else {
								?>
								<li> <?php echo $this->session->flashdata('segment')[$i]; ?> </li>
								<?php
							}

							if ($i == 0 && $i == (count($this->session->flashdata('segment'))-1)) {
								?>
								<li class="breadcrumb-item active"> </li>
								<?php
							}
						}
						?>
					</ol>
				</div>
			</div>
		</div>
	</div>

</div>