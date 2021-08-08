<div class="container mt-3">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-8">
							<div class="row">
								<?php foreach ($paslon as $item) : ?>
									<div class="col-6">
										<div class="card-img">
											<div class="text-center mt-3">
												<img src="<?= 'http://localhost/e-voting-rt/assets/img//' . $item['image']; ?>" class="img-profile rounded-top" width="100%">
											</div>
											<div class="text-center bg-danger p-2 rounded-bottom">
												<h4 class="card-text text-white"><?= $item['nama']  ?></h4>
											</div>
											<div class="mt-2 text-center">
												<?php if (!$this->session->userdata('nik')) : ?>
													<button class="btn btn-light shadow-sm" data-toggle="modal" data-target="#voteModal"> <b>VOTE</b> </button>
												<?php elseif($user['vote_status'] == 1) : ?>
													<button class="btn btn-light shadow-sm" disabled> <b>VOTE</b> </button>
												<?php else : ?>
													<a href="<?= base_url('vote-kandidat/') . $item['id']  ?>" class="btn btn-light shadow-sm"> <b>VOTE</b> </a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="col-4">tulisan petunjuk pemilihan</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="voteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
			<div class="text-center">
				<h5 class="text-danger">
					Login untuk memilih kandidat!
				</h5>
			</div>
			</div>
			<div class="bg-danger p-2 text-center">
				<a href="" class="text-white" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>